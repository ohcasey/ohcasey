<div class="calculator-main">
    
    <div class="calc-window-title">
        <div class="title-text">Рассчитайте сроки и стоимость доставки в Ваш город</div>
        <div class="title-close-button">X</div>    
    </div>
    
    <div class="calculator container">
        
        <div class="row city-row">
            <form class="city-inactive-form">
                <input type="text" class="city-input" placeholder="Выберите Ваш город доставки">
                <div class="suggest-city-list"></div>
            </form>
        </div>
        
        <div class="row delivery-method-row">
            
            <div class="col self-delivery">
                <div class="delivery-title">Самовывоз из шоурума</div>
                <div class="delivery-time">
                   <img src="../../css/images/clock.png" class="clock-icon">
                   <span class="delivery-text">0 дней</span>
                </div>
                <div class="delivery-cost">0 р.</div>
            </div>
            
            <div class="col mail-delivery active">
                <div class="delivery-title">Почтой России</div>
                <div class="delivery-time">
                    <img src="../../css/images/clock.png" class="clock-icon">
                    <span class="delivery-text">от 5 дней</span>
                </div>
                <div class="delivery-cost">300 р.</div>                
            </div>
            
            <div class="col courier-msk-delivery hidden">
                <div class="delivery-title">Курьером по Москве</div>
                <div class="delivery-time">
                    <img src="../../css/images/clock.png" class="clock-icon">
                    <span class="delivery-text">от 2 дней</span>
                </div>
                <div class="delivery-cost">410 р.</div>                
            </div>      
            
            <div class="col courier-rus-delivery hidden">
                <div class="delivery-title">Курьером по России</div>
                <div class="delivery-time">
                    <img src="../../css/images/clock.png" class="clock-icon">
                    <span class="delivery-text">от 7 дней</span>
                </div>
                <div class="delivery-cost">600 р.</div>                
            </div>            
            
             <div class="col sdec-point-delivery hidden">
                <div class="delivery-title">Курьером по Москве</div>
                <div class="delivery-time">
                    <img src="../../css/images/clock.png" class="clock-icon">
                    <span class="delivery-text">от 4 дней</span>
                </div>
                <div class="delivery-cost">520 р.</div>                
            </div>           
            
            
            <!--
            <div class="col courier-rus-delivery">
                <div class="delivery-title">Курьером по России</div>
                <div class="delivery-icon"></div>
                <div class="delivery-time">
                    <span class="clock-icon"></span>
                </div>
                <div class="delivery-cost"></div>                
            </div>
            
            <div class="col sdec-point-delivery">
                <div class="delivery-title">Самовывоз из пункта выдачи</div>
                <div class="delivery-icon"></div>
                <div class="delivery-time">
                    <span class="clock-icon"></span>
                </div>
                <div class="delivery-cost"></div>                
            </div>
            -->
        </div>
        
        <div class="row details-row">
            <form class="details-inactive-form">
                <input type="text" class="address-input" placeholder="Введите адрес доставки">
            </form>
        </div>
        
        <div class="row show-on-map-row">
            
        </div>
        <div class="row about-text-row">
            <p>
                После оформления заказа в течении 15 минут с Вами свяжется наш менеджер (с 11:00 до 21:00).<br>
                При условии наличия товара, мы постараемся отправить Ваш заказ в этот же день.
            </p>
            <p>Именные чехлы мы высылаем ЧЕРЕЗ ДЕНЬ после заказа.</p>
            <p>
                * Мы высылаем заказы Почтой Росии первым классом. В среднем, доставка в любой город Росии занимает 7-9 дней
                Для получения заказа Вам будет необходимо прийти в отделение почтовой связи, индекс которого Вы указали в заказе.
            </p>
            <p>* Получатель должен иметь при себе паспорт</p>
            <hr class="text-separator">
            <p class="centered">
                Мы высылаем заказы в другие города только по 100% предоплате.<br>
                При получении заказа никаких доплат не требуется.
            </p>
        </div>
        
    </div>
</div>