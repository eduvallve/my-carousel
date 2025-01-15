/**
 * Admin JS code
*/

const cfgMcAdmin = {
    selectors: {
        general: {
            infoSpot: '.dashicons-info[title]'
        },
        carousel: {
            editPage: '#mc-carousel-edit',
            addCardBtn: '.mc__card--add',
            cardList: '.mc__card--list'
        },
        card: {
            card: '.mc__card',
            removeBtn: '.card__remove'
        }
    },
     classes: {
        card: {
            removeBtn: 'card__remove'
        }
     }
}

/** Basic class */
class BasicMcComponent {
    constructor(el) {
        this.el = el;
    }
}

/** Class for Edit Carousel */
class EditMcCarousel extends BasicMcComponent {
    constructor(el) {
        super (el);
        this.init();
    }

    init() {
        this.setRefs();
        this.addEventListeners();
    }

    setRefs() {
        this.addCardBtn = this.el.querySelector(cfgMcAdmin.selectors.carousel.addCardBtn);
        this.newCardUrl = this.addCardBtn.dataset.newCard;
        this.cardList = this.el.querySelector(cfgMcAdmin.selectors.carousel.cardList);
    }

    addEventListeners() {
        this.addCardBtn.addEventListener('click', this.addCard.bind(this));
    }

    addCard() {
        this.fileGetContents(this.newCardUrl);
    }

    cardClicked(e) {
        if (e.target.classList.contains(cfgMcAdmin.classes.card.removeBtn)) {
            this.removeCard(e.target);
        }
    }

    removeCard(target) {
        const card = target.closest(cfgMcAdmin.selectors.card.card);
        // console.log('remove', card);
        card.remove();
    }

    fileGetContents(filename) {
        fetch(filename).then((resp) => resp.text()).then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const card = doc.querySelector('.mc__card').innerHTML;
            const li = document.createElement('li');
            li.classList.add('mc__card');
            li.addEventListener('click', e => { this.cardClicked(e); });
            li.innerHTML = card;
            this.cardList.append(li);
            this.cardList.querySelectorAll(cfgMcAdmin.selectors.general.infoSpot).forEach(infoSpot => {
                new InfoSpot(infoSpot);
            });
        });
    }
}

/**
 * Initialize first load class instances
 */

window.addEventListener("load", function() {
    const editCarouselPage = document.querySelector(cfgMcAdmin.selectors.carousel.editPage);
    if (editCarouselPage) {
        new EditMcCarousel(editCarouselPage);
    }
});
