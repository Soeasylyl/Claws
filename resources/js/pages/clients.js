class Clients {
    constructor() {
        this.iconContainers = document.querySelectorAll('.clients__trash-container a');
        this.init();
    }

    init() {
        this.deleteClient();
    }

    deleteClient() {
        this.iconContainers && this.iconContainers.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();

                const clientId = link.getAttribute('data-id');
                if (confirm('Вы уверены?')) {
                    document.getElementById('delete-form-' + clientId).submit();
                }
            });
        });
    }
}

new Clients();
