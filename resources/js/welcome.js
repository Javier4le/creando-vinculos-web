import { loadData } from './map';



const btnContainer = document.getElementById("v-pills-tab");


window.onload = () => btnContainer.firstElementChild.click();

btnContainer.addEventListener('click', e => {
    loadData(e.target)
})
