
class Slide extends HTMLElement {
    constructor() {
        super();
        const container = document.createElement('div')
        container.setAttribute('class' , 'slides')
        const iframe = document.createElement('iframe')
        iframe.src = 'https://view.officeapps.live.com/op/view.aspx?src='+(this.hasAttribute('src') ? this.getAttribute('src') : '')+'&embedded=true'
        iframe.setAttribute('scrolling', 'no')
        iframe.setAttribute('frameborder', '0')
        iframe.setAttribute('webkitallowfullscreen', 'true')
        iframe.setAttribute('mozallowfullscreen', 'true')
        iframe.setAttribute('allowfullscree', 'true')
        container.appendChild(iframe)
        this.appendChild(container)

    }

    connectedCallback() {
        console.log('this is connected')
    }
}
customElements.define('mat-amal', Slide);

