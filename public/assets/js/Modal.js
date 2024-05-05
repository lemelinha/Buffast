function createModal(text) {
    const modal = document.createElement('dialog');
    const paragraph = document.createElement('p');
    paragraph.textContent = text;
    modal.appendChild(paragraph);

    const closeModal = document.createElement('span');
    const X = document.createElement('i'); // icon do fw pro X pra fechar o modal
    X.classList.add('fa-solid', 'fa-x');
    closeModal.appendChild(X);

    closeModal.addEventListener('click', function() {
        modal.classList.add('hide')
        gsap.to(modal, {
            x: '100vw',
            onComplete: () => {
                modal.close();
                document.body.removeChild(modal);
            }
        });
    });

    modal.appendChild(closeModal);

    document.body.appendChild(modal);
    modal.showModal();
    gsap.fromTo(modal, 
        {
            x: '100vw',
            'transform': 'translate(-50%, -50%)'
        },
        {
            'transform': 'translate(-50%, -50%)'
    });
}