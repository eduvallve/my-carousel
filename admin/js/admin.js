/**
 * Admin JS code
*/

const cfgMcAdmin = {
    selectors: {
        general: {
            // infoSpot: '.dashicons-info[title]'
        },
        carousel: {
            editPage: '#mc-carousel-edit',
            addCardBtn: '.mc__card--add',
            cardList: '.mc__card--list'
        },
        card: {
            card: '.mc__card',
            removeBtn: '.mc__card__remove',
            showHideBtn: '.mc__card__showhide',
            showHideStates: '.mc__card__showhide__state',
            cardVisibility: '.mc__card__visibility'
        }
    },
     classes: {
        card: {
            removeBtn: 'mc__card__remove',
            showHideBtn: 'mc__card__showhide',
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
        this.removeCardBtns = this.el.querySelectorAll(cfgMcAdmin.selectors.card.removeBtn);
        this.showHideBtns = this.el.querySelectorAll(cfgMcAdmin.selectors.card.showHideBtn);
        this.newCardUrl = this.addCardBtn.dataset.newCard;
        this.cardList = this.el.querySelector(cfgMcAdmin.selectors.carousel.cardList);
    }

    addEventListeners() {
        this.addCardBtn.addEventListener('click', this.addCard.bind(this));
        // console.log(this.el);
        this.removeCardBtns.forEach(removeBtn => {
            removeBtn.addEventListener('click', e => this.removeCard(e.target));
        });
        this.showHideBtns.forEach(showHideBtn => {
            showHideBtn.addEventListener('click', e => this.toggleShowHide(e.target));
        })
    }

    addCard() {
        this.fileGetContents(this.newCardUrl);
    }

    cardClicked(e) {
        if (e.target.classList.contains(cfgMcAdmin.classes.card.removeBtn)) {
            this.removeCard(e.target);
        } else if (e.target.classList.contains(cfgMcAdmin.classes.card.showHideBtn)) {
            this.toggleShowHide(e.target);
        }
    }

    removeCard(target) {
        const card = target.closest(cfgMcAdmin.selectors.card.card);
        // console.log('remove', card);
        card.remove();
    }

    toggleShowHide(target) {
        // if(target.dataset.cardVisible === 'true') {
        // }
        target.querySelectorAll(cfgMcAdmin.selectors.card.showHideStates).forEach(state => {
            state.classList.toggle('hidden');
        });
        // target.dataset.cardVisible = !target.dataset.cardVisible;
        const state = target.querySelector(cfgMcAdmin.selectors.card.cardVisibility);
        state.value = state.value === 'true' ? 'false' : 'true' ;
    }

    fileGetContents(filename) {
        fetch(filename, {
            headers: {
                "Content-Type": "text/plain"
            }
        }).then((resp) => resp.text()).then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const card = doc.querySelector('.mc__card').innerHTML;
            const li = document.createElement('li');
            li.classList.add('mc__card');
            li.addEventListener('click', e => { this.cardClicked(e); });
            li.innerHTML = card;
            this.cardList.append(li);
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
