<div class="border titleBarPanel boxNewsletterBox" id="box{$box->boxID}">
    <div class="containerHead">
        <div class="containerIcon">
            <a href="javascript: void(0)" onclick="openList('{@$box->getStatusVariable()}', { save:true })"><img src="{icon}minusS.png{/icon}" id="{@$box->getStatusVariable()}Image" alt="" /></a>
        </div>
        <div class="containerContent">
            <h3>{lang}wbb.portal.box.deepThought.title{/lang}</h3>
        </div>
    </div>
    <div class="container-1" id="{@$box->getStatusVariable()}">
        <div class="containerContent">      
        {if $box->showForm}
            {if $box->isGuest}
            <form action="index.php?form=NewsletterRegisterGuest" method="post">
                <div class="border content">
                    <div class="container-1">
                        <div class="formElement" id="emailDiv">
                            <div class="formFieldLabel">
                                <label for="email">{lang}wcf.acp.newsletter.subscriber.email{/lang}</label>
                            </div>
                            <div class="formField">
                                <input type="text" class="inputText" id="email" name="email" value="{$email}" />
                            </div>
                        </div>
                        <div class="formElement" id="checkboxDiv">
                            <div class="formFieldLabel">
                                <label for="checkbox">{lang}wcf.user.option.acceptNewsletter{/lang}</label>
                            </div>
                            <div class="formField">
                                <input type="checkbox" id="checkbox" name="checkbox" value="{$checkbox}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formSubmit">
                    <input type="submit" name="send" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" tabindex="{counter name='tabindex'}" />
                    <input type="reset" name="reset" accesskey="r" value="{lang}wcf.global.button.reset{/lang}" tabindex="{counter name='tabindex'}" />
                    {@SID_INPUT_TAG}
                </div>
            </form>
            {else}
                {if $box->isSubscriber}
                    <p>{lang}wbb.portal.box.newsletterBox.alreadySubscriber{/lang}</p>
                {else}
                    <p>{lang}wbb.portal.box.newsletterBox.registered{/lang}
                {/if}    
            {/if}
        {else}
            <p>{lang}wbb.portal.box.newsletterBox.editMode{/lang}              
        {/if}
        </div>
    </div>
</div>