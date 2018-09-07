$(function(){

    var $form=$('#payment-form');

    $form.submit(function(event){
        //Disable the submit button to prevent
        $form.find('.submit').prop('disabled',true);

        Stripe.card.createToken($form,stripeResponseHandler);
        return false;
    });
});