import SignaturePad from "signature_pad";

document.addEventListener('alpine:init', () => {
    Alpine.data('signaturePadComponent',
        ({
            state,
            signaturePadId,
            disabled,
            dotSize,
            minWidth,
            maxWidth,
            minDistance,
            penColor,
            backgroundColor,
         }) => ({
            signaturePad: null,
            signaturePadId,
            state,
            disabled,
            init() {
                if (!disabled) {
                    this.resizeCanvas();
                    this.signaturePad = new SignaturePad(this.$refs.canvas, {
                        dotSize: dotSize || 2,
                        minWidth: minWidth || 1,
                        maxWidth: maxWidth || 2.5,
                        minDistance: minDistance || 2,
                        penColor: penColor || 'rgb(0,0,0)',
                        backgroundColor: backgroundColor || 'rgba(0,0,0,0)'
                    });
                    if (this.state) {
                        // pass ratio when loading a saved signature
                        this.signaturePad.fromDataURL(this.state, {ratio: this.ratio});
                    }
                    this.signaturePad.addEventListener("beginStroke", () => {
                        console.log("Signature started");
                    }, {once: false});
                    this.signaturePad.addEventListener("endStroke", (e) => {
                        this.save();
                    }, {once: false});

                    this.signaturePad.addEventListener("afterUpdateStroke", () => {
                        // console.log("Signature updated");
                    }, {once: false});
                }

            },
            save() {
                this.state = this.signaturePad.toDataURL('image/svg+xml');
                this.$dispatch('signature-saved', this.signaturePadId);
            },
            clear() {
                this.signaturePad.clear();
                this.state = null;
            },
            // The resize canvas function https://github.com/szimek/signature_pad#tips-and-tricks﻿
            resizeCanvas() {

                this.ratio = Math.max(window.devicePixelRatio || 1, 1);
                this.$refs.canvas.width = this.$refs.canvas.offsetWidth * this.ratio;
                this.$refs.canvas.height = this.$refs.canvas.offsetHeight * this.ratio;
                this.$refs.canvas.getContext('2d').scale(this.ratio, this.ratio);
                // this.signaturePad?.fromData(this.signaturePad.toData());
                // this.signaturePad?.clear();

            },
            downloadSVG() {
                if (this.signaturePad.isEmpty()) {
                    alert("Please provide a signature first.");
                } else {
                    const dataURL = this.signaturePad.toDataURL('image/svg+xml');
                    this.download(dataURL, "signature.svg");
                }
            },
            downloadPNG() {
                if (this.signaturePad.isEmpty()) {
                    alert("Please provide a signature first.");
                } else {
                    const dataURL = this.signaturePad.toDataURL();
                    this.download(dataURL, "signature.png");
                }
            },
            downloadJPG() {
                if (this.signaturePad.isEmpty()) {
                    alert("Please provide a signature first.");
                } else {
                    this.signaturePad.backgroundColor = 'rgb(255,255,255)';
                    const dataURL = this.signaturePad.toDataURL("image/jpeg");
                    this.download(dataURL, "signature.jpg");
                }
            },

            download(dataURL, filename = 'signature') {
                const blob = this.dataURLToBlob(dataURL);
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement("a");
                a.href = url;
                a.style = "display: none";
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
            },
            dataURLToBlob(dataURL) {
                // Code taken from https://github.com/ebidel/filer.js
                const parts = dataURL.split(';base64,');
                const contentType = parts[0].split(":")[1];
                const raw = window.atob(parts[1]);
                const rawLength = raw.length;
                const uInt8Array = new Uint8Array(rawLength);

                for (let i = 0; i < rawLength; ++i) {
                    uInt8Array[i] = raw.charCodeAt(i);
                }

                return new Blob([uInt8Array], {type: contentType});
            }
        }))
});
