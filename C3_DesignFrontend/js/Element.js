class Elementr extends App {
    constructor(x, y, connections=[]) {
        super(canvas)
        this.x = x;
        this.y = y;
        this.connections = connections;
        this.element = null;
        this.id = 1;
        this.content = '';
    }
    create() {
        let dummy = elementDummy.cloneNode(true);
        this.element = dummy;
        this.element.style.left = `${this.x}px`;
        this.element.style.top = `${this.y}px`;
        this.element.style.display = 'flex';
        this.element.setAttribute('id', `element-${this.id}`);
        this.draw();
        this.listener()
    }
    draw() {
        console.log('bisa mint')
        console.log(this.element)
        appEl.appendChild(this.element);
    }
    listener() {
        this.element.querySelectorAll('.number').forEach(number => {
            number.addEventListener('click', (e) => {
                let numberClicked = e.target.getAttribute('data-number');
                if(this.connections.some(conn => conn.number == this.numberToConnect(numberClicked))) return;

                let id = this.newElement({
                    element: this.element,
                    number: numberClicked,
                    id:this.id // from id
                    },{
                    number: this.numberToConnect(numberClicked)
                });
                this.connections.push({
                    number: this.numberToConnect(numberClicked),
                    text: ``,
                    id
                })
            });
        });

        let content = document.getElementById('content');
        let relations = document.getElementById('relations');

        this.element.querySelector('.edit').addEventListener('click', e => {
            content.value = this.content;    
            document.getElementById('backdrop').style.display = "block";
            document.getElementById('editor').style.display = "block";

            localStorage.setItem('active_element', this.id);
            console.log(this.connections)
            relations.innerHTML = "";
            this.connections.forEach(c => {
                let connEl = document.createElement('input');
                connEl.setAttribute('type', 'text');
                connEl.setAttribute('placeholder', `Relation ${this.numberToConnect(c.number)}`);
                connEl.value = c.text;
                connEl.addEventListener('keydown', ev => {
                    c.text = ev.target.value;
                })
                relations.appendChild(connEl)
            })
        });
        this.element.addEventListener('dragover', e => {
            let dragged = e.target;
            console.log(e.clientX, e.clientY)
            e.target.style.left = e.clientX;
        })
        this.element.addEventListener('dragend', e => {
            let dragged = e.target;
            console.log(e.clientX, e.clientY)
            e.target.style.left = e.clientX;
            e.target.style.top = e.clientY;
        })

    }
}