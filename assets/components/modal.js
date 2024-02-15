import { Controller } from 'stimulus'

export default class extends Controller {
    connect() {
        this._setupModal()
    }

    _setupModal() {
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