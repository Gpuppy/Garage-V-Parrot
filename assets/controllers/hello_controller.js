

//import { Controller } from '@hotwired/stimulus';

/*export default class extends Controller {
    static targets = ['hello'];

    connect() {
        /*this.element.addEventListener('turbo:submit-end', (event) => {
            if (event.detail.success) {
                this.show_modal('SecondHandCar.description');

    }
})

    }

    /*_setupModal() {
        const modalTrigger = this.element
        const modal = document.querySelector(modalTrigger.dataset.target)

        modalTrigger.addEventListener('click', (e) => {
            e.preventDefault()
            modal.classList.add('active')
        })

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active')
            }
        })

    }


}

/*this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';*/

/*openModal(event) {
    const modal = new Modal(this.modalTarget);
    modal.show('SecondHandCar.description');*/