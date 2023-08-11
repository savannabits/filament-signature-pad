import SignaturePad from "signature_pad";

export default function signaturePad(args) {
    return {
        state: args.state,
        disabled: args.disabled,
        dotSize: args.dotSize,
        minWidth: args.minWidth,
        maxWidth: args.maxWidth,
        minDistance: args.minDistance,
        penColor: args.penColor,
        signaturePad: null,
        backgroundColor: args.backgroundColor,
        init() {
            const canva = this.$refs.canvas;
            if (!canva) {
                console.error('Canvas is not present')
                return;
            }

            this.signaturePad = new SignaturePad(this.$refs.canvas, {
                dotSize: this.dotSize || 2,
                minWidth: this.minWidth || 1,
                maxWidth: this.maxWidth || 2.5,
                minDistance: this.minDistance || 2,
                penColor: this.penColor || 'rgb(0,0,0)',
                backgroundColor: this.backgroundColor || 'rgba(255,255,255,0)'
            });
            window.addEventListener('resize', e => this.resizeCanvas())
            this.resizeCanvas();
            if (this.state) {
                console.log('state present')
                // pass ratio when loading a saved signature
                this.signaturePad.fromDataURL(this.state, {ratio: this.ratio});
            }
            this.signaturePad.addEventListener("beginStroke", () => {
                console.log("Signature started");
            }, {once: false});
            this.signaturePad.addEventListener("endStroke", (e) => {
                console.log("End stroke")
                this.save();
            }, {once: false});

            this.signaturePad.addEventListener("afterUpdateStroke", () => {
                // console.log("Signature updated");
            }, {once: false});
        },
        async toBlob(url) {
            if (url) {
                const blob = await (await fetch(url)).blob();
            }
        },
        save() {
            this.state = this.signaturePad.toDataURL('image/svg+xml');
            // this.state = this.signaturePad.toSVG();
            // this.$dispatch('signature-saved', this.signaturePadId);
            // console.log(this.state);
        },
        clear() {
            this.signaturePad.clear();
            this.state = null;
        },
        // The resize canvas function https://github.com/szimek/signature_pad#tips-and-tricks﻿
        resizeCanvas() {
            const canva = this.$refs.canvas;
            this.ratio = Math.max(window.devicePixelRatio || 1, 1);
            let dimensions = this.getCanvasOffsetDimensions();
            console.log(dimensions.width);
            console.log(dimensions.height);
            canva.width = dimensions.width * this.ratio;
            canva.height = dimensions.height * this.ratio;
            canva.getContext('2d').scale(this.ratio, this.ratio);
            // this.signaturePad?.fromData(this.signaturePad.toData());
            this.signaturePad?.clear();

        },
        getCanvasOffsetDimensions()
        {
            const canva = this.$refs.canvas;
            const element = canva.cloneNode(true);
            if (canva.offsetHeight > 0 && canva.offsetWidth > 0) {
                return {
                    height: canva.offsetHeight,
                    width: canva.offsetWidth
                }
            }
            element.style.visibility = "hidden";
            document.body.appendChild(element);
            const height = element.offsetHeight;
            const width = element.offsetWidth;
            document.body.removeChild(element);
            return {
                height: height,
                width: width
            };
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
                const dataURL = this.signaturePad.toDataURL('image/png');
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
    }
}
