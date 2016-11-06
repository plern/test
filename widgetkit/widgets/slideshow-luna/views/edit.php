<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">Slideshow</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>

    </div>

    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="wk-form-heading">{{'Panel' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-panel">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-panel" class="uk-form-width-medium" ng-model="widget.data['panel']">
                            <option value="box">{{'Box' | trans}}</option>
                            <option value="primary">{{'Box Primary' | trans}}</option>
                            <option value="secondary">{{'Box Secondary' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Navigation' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Color' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['nav_contrast']"> {{'Use a high-contrast color.' | trans}}</label>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Animations' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-animation">{{'Animation' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-animation" class="uk-form-width-medium" ng-model="widget.data['animation']">
                            <option value="fade">{{'Fade' | trans}}</option>
                            <option value="scroll">{{'Scroll' | trans}}</option>
                            <option value="swipe">{{'Swipe' | trans}}</option>
                            <option value="scale">{{'Scale' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-duration">{{'Duration (ms)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-duration" class="uk-form-width-medium" type="text" ng-model="widget.data['duration']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Autoplay' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['autoplay']"> {{'Enable autoplay' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['interval']"> Interval (ms)</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input type="checkbox" ng-model="widget.data['autoplay_pause']"> {{'Pause autoplay when hovering the slideshow' | trans}}</label>
                        </p>
                    </div>
                </div>

            </li>

            <li>

                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['title']"> {{'Show title' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['content']"> {{'Show content' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-content-size">{{'Content Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-content-size" class="uk-form-width-medium" ng-model="widget.data['content_size']">
                            <option value="">{{'Default' | trans}}</option>
                            <option value="large">{{'Text Large' | trans}}</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Link' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link']"> {{'Link media item' | trans}}</label>
                    </div>
                </div>

            </li>

            <li>

                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Target' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>
            </li>
        </ul>

    </div>

</div>
