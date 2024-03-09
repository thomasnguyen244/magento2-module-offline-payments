define(
    ['mage/translate', 'Magento_Ui/js/model/messageList', 'jquery'],
    function ($t, messageList, $) {
        'use strict';
        return {
            validate: function () {
                let isValid = false;

                let maxLenghtConfig = window.checkoutConfig.bs_code_length;
                let consecutiveCharsConfig = window.checkoutConfig.consecutive_chars;

                let tmoCostcentercode = $('#tmo_costcentercode').val();

                if (typeof(tmoCostcentercode) != "undefined"){

                if(tmoCostcentercode.length >= parseInt(maxLenghtConfig)){
                    if(tmoCostcentercode.indexOf(consecutiveCharsConfig) == 0 || consecutiveCharsConfig == null){
                        isValid = true;
                    }
                }

                if (!isValid) {
                    let errorMsg = `Costcentercode must be atleast ${maxLenghtConfig} characters `;
                    if(consecutiveCharsConfig != null){
                        errorMsg =  errorMsg + `and start with ${consecutiveCharsConfig}`;
                    }
                    if($(".JJcustomError")){
                        $(".JJcustomError").html("");
                    }
                    $("#tmo_costcentercode").after(`<p class="JJcustomError"> ${errorMsg} </p>`);
                    $(".JJcustomError").css({color:"red"});
                    messageList.addErrorMessage({ message: $t('') });
                }

                return isValid;
            }
            }
        }
    }
);
