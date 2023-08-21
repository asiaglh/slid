let popUp; // Оголосіть змінну popUp тут, зовні блоку if


window.onload = () => {
    popUp = document.querySelector('.pop-up'); // Присвойте змінній popUp значення всередині блоку if
    popUp.addEventListener('click', ({target}) => {
        if (target.matches('.pop-up__close') || target.matches('.pop-up__bg')) {
            closeWindow();
        }
    })
};

let count = 1;




/**************pop-up window*************/
const disableScroll = () => {
        const widthScroll = window.innerWidth - document.body.offsetWidth;
        const popup = document.querySelector('.pop-up__bg');
        if(window.innerWidth > 767) {
            document.body.dbScrollY = window.scrollY;
            document.body.style.cssText = `
                            position: fixed;
                            top: -${window.scrollY}px;
                            left: 0;
                            width: 100%;
                            height: 100vh;
                            overflow: hidden;
                            padding-right: ${widthScroll}px;
                            `;
             popup.style.top = `${document.body.scrollTop}px`;
        }
    }

const enableScroll = () => {
    document.body.style.cssText = '';
    window.scroll({
        top: document.body.dbScrollY,
    })
}

const closeWindow = () => {
    popUp.classList.remove('active');
    popUp.innerHTML = '';
        enableScroll();
}

const isValidInputs= (inputs) => {
    let status = true;

    const inputLength = (input) => {
        let count = input.classList.contains('phone') ? 17 : 0;
        if(input.value.length > count){
            if(input.classList.contains('invalidInput')){
                input.classList.remove('invalidInput');
                status = true;
            }
        }else{
            input.classList.add('invalidInput')
            status = false;
            }
        }

        inputs.forEach( input => {
            input.onkeyup  = (e) => inputLength(input);
            inputLength(input);
        })
    return status;
}

const openPopUpForm = () => {
        let template = `
               <div class="pop-up__bg">
                <div class="pop-up__block">
                    <div class="pop-up__scroll">
                        <div class="pop-up__close"></div>
                        <h2 class="pop-up__title">Замовити книгу</h2>
                        <div class="pop-up__row">
                            <p class="pop-up__label">Отримувач</p>
                            <div class="pop-up__inputs inputs">
                                <input type="text" class="pop-up__input input requared" placeholder="Імʼя" name="firstname">
                                <input type="text" class="pop-up__input input requared" placeholder="Прізвище" name="lastname">
                                <input type="text" class="pop-up__input input phone requared" placeholder="Телефон" name="tel">
                                <input type="email" class="pop-up__input input" placeholder="E-mail" name="email">
                            </div>
                        </div>
                        <div class="pop-up__row">
                            <p class="pop-up__label">Кількість книг</p>
                            <div class="pop-up__inputs pop-up__amount">
                                <button class="pop-up__count pop-up__prev">-</button>
                                <input type="number" class="pop-up__input input pop-up__number" value="1">
                                <button class="pop-up__count pop-up__next" >+</button>
                            </div>
                        </div>
                        <div class="pop-up__row">
                            <p class="pop-up__label">Спосіб оплати</p>
                            <div class="pop-up__inputs">
                                <label class="pop-up__radioLabel">
                                    <input type="radio" id="payment" name="payment" value="payment" checked>
                                    Накладений платіж
                                </label>
                                <label class="pop-up__radioLabel">
                                    <input type="radio" id="card" name="payment" value="card">
                                    Картою</label>
                            </div>
                        </div>
                        <div class="pop-up__row">
                            <p class="pop-up__label">Доставка</p>
                            <div class="pop-up__inputs">
                                <div class="pop-up__select">
                                    <div class="pop-up__summary input">Місто</div>
                                    <div class="pop-up__dropdown">
                                        <div class="pop-up__options">
                                            <div class="pop-up__option">Київ</div>
                                            <div class="pop-up__option">Львів</div>
                                            <div class="pop-up__option">Чернігів</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pop-up__select">
                                    <div class="pop-up__summary input">Відділення</div>
                                    <div class="pop-up__dropdown">
                                        <div class="pop-up__options">
                                            <div class="pop-up__option">№ 215</div>
                                            <div class="pop-up__option">№ 216</div>
                                            <div class="pop-up__option">№ 217</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pop-up__row">
                            <p class="pop-up__label">Коментар</p>
                            <div class="pop-up__inputs">
                                <textarea class="pop-up__textarea input" placeholder="Коментар до замовлення">
                                </textarea>
                            </div>
                        </div>
                        <div class="pop-up__row pop-up__column">
                            <p class="pop-up__label pop-up__label-column">До сплати</p>
                            <div class="pop-up__price"><span>350 грн</span> + доставка</div>
                                <button class="pop-up__btn" onclick="thanksPopUp(this)">
                                    <div class="pop-up__btn-pad" >Замовити</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        popUp.classList.add('active');
        popUp.innerHTML = template;
        disableScroll();

         $(function(){
            $(".phone").mask("+38(099) 999-99-99");
        });

        const num = document.querySelector('.pop-up__number');
        const prevBtn = document.querySelector('.pop-up__prev');
        const nextBtn = document.querySelector('.pop-up__next');
        const selects = document.querySelectorAll('.pop-up__select');
        const summaries = document.querySelectorAll('.pop-up__summary');
        const options = document.querySelectorAll('.pop-up__option');

        nextBtn.onclick = () => {
            count++;
            num.value = count;
        }

        prevBtn.onclick = () => {
            count <= 1 ? count = 1 : count--;
            num.value = count;
            }

        num.onkeyup = () => {
            if(num.value.trim() !== "") {
            count = num.value;
            }
        }

        /*************selects***************/
        summaries.forEach(el => {
            el.addEventListener('click', ({target}) => {
                const parent = target.closest('.pop-up__select');
                if(!parent.matches('.active'))
                {
                    selects.forEach(el => el.classList.remove('active'))
                    parent.classList.add('active');
                } else {
                    parent.classList.remove('active');
                }
                })
            }
        );

        options.forEach(el => {
            el.addEventListener('click', ({target}) => {
                const parent = target.closest('.pop-up__select');
                    if(!target.matches('.selected')) {
                        const optionsArr = parent.querySelectorAll('.pop-up__option');
                        const header = parent.querySelector('.pop-up__summary');
                        optionsArr.forEach(el => el.classList.remove('selected'));
                        target.classList.add('selected');
                        header.innerText = target.innerText;
                        parent.classList.remove('active');
                    }
                })
            }
        );
}

const thanksPopUp = (e) => {
       const parent = e.closest('.pop-up__scroll');
       const requaredInputs = parent.querySelectorAll('.requared');

       if(isValidInputs(requaredInputs)){
            closeWindow();
       }
    }

