const appEl = document.getElementById('app');
const elementDummy = document.getElementById('element-dummy');
const canvas = document.getElementById('canvas')
const closeButton = document.getElementById('close');
const editor = document.getElementById('editor');
const backdrop = document.getElementById('backdrop');
let content = document.getElementById('content');

let lines=[], elements=[]

const app = new App(canvas);
app.init();


closeButton.addEventListener('click', (e) => {
    editor.style.display = 'none'
    backdrop.style.display = 'none'
})
content.addEventListener('keydown', e => {
    elements.forEach(el => {
        if(el.id == localStorage.getItem('active_element')) {
            el.content = e.target.value;
        }
    })
});