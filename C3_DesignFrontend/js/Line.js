class Line {
    constructor(canvas, from, to, w, h) {
        this.canvas= canvas;
        this.ctx =canvas.getContext('2d');
        this.from = from;
        this.to = to;
        this.w = w;
        this.h = h;
    }
    draw() {
        this.ctx.beginPath();
        this.ctx.strokeStyle='black';
        this.ctx.moveTo(this.from.x, this.from.y);
        this.ctx.lineTo(this.to.x, this.to.y);
        this.ctx.closePath()
        this.ctx.stroke();
    }
}