class App {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.elementDistance = 75;
    }
    init() {
        this.elements = [];
        let firstElement = new Elementr(
            document.body.clientWidth/2,
            document.body.clientHeight/2,
            []
        );
        firstElement.id = this.elements.length;
        firstElement.create();
        elements.push(firstElement)

        // Init canvas
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;

        this.render();
    }
    render() {
        lines.forEach((line) => {
            line.draw();
        })
        requestAnimationFrame(() => this.render());
    }
    newLine(from, to) {
        let line = new Line(canvas, from, to, this.elementDistance, 3);
        lines.push(line);
    }
    newElement(from, to) {
        let connectToNumber;
        let element = new Elementr;
        let xFrom, yFrom, xTo, yTo;

        if(from.number == 1) {
            // ke atas
            connectToNumber = 3;
            xFrom = from.element.offsetLeft ;
            yFrom = from.element.offsetTop;
            xTo = from.element.offsetLeft  // same x as fromElement
            yTo = from.element.offsetTop - this.elementDistance - from.element.clientHeight// move to top as elementDistance px
        }else if(from.number == 2) {
            // ke atas
            connectToNumber = 4;
            xFrom = from.element.offsetLeft + from.element.clientWidth/2;
            yFrom = from.element.offsetTop ;
            xTo = from.element.offsetLeft + this.elementDistance  + from.element.clientWidth 
            yTo = from.element.offsetTop // same y as fromElement
        }else if(from.number == 3) {
            // ke atas
            connectToNumber = 1;
            xFrom = from.element.offsetLeft ;
            yFrom = from.element.offsetTop;
            xTo = from.element.offsetLeft, // same x as fromElement  
            yTo = from.element.offsetTop + this.elementDistance + from.element.clientHeight
        }else if(from.number == 4) {
            // ke atas
            connectToNumber = 2;
            xFrom = from.element.offsetLeft;
            yFrom = from.element.offsetTop ;
            xTo = from.element.offsetLeft - this.elementDistance - from.element.clientWidth, 
            yTo = from.element.offsetTop // same y as fromElement  
        }
        element.connections.push({
            number: from.number,
            text: ``,
            id: from.id
        });
        element.x = xTo;
        element.y = yTo;
        element.id = elements.length;
        element.create()
        elements.push(element)


        this.newLine({x: xFrom, y: yFrom}, {x: xTo, y: yTo});
        console.log(elements, lines)
        return element.id;
    }

    displayPresentation(id) {
        console.log('displaying', id)
        let navigations = document.querySelector('.navigations');
        navigations.innerHTML = '';
        elements.forEach(el => {
            if(el.id == id) {
                console.log(el)
                text.innerText = el.content;

                el.connections.forEach((conn,index) => {
                    let div = document.createElement('div');
                    let btn = document.createElement('button');
                    btn.classList.add('btn');
                    btn.innerText = `${index+1} - ${conn.text}`

                    btn.addEventListener('click', e => {
                        console.log(conn)
                        this.displayPresentation(conn.id)
                    })

                    div.appendChild(btn)
                    navigations.appendChild(div)
                })
            }
        })
    }
    
    numberToConnect(from) {
        if(from == 1) return 3;
        else if(from == 2) return 4;
        else if(from == 3) return 1;
        else if(from == 4) return 2;
    }
}