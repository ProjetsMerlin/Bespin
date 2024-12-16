"use strict"
jQuery(document).ready(function(){
    jQuery('.js_tabs a').on('click', function(e) {
        e.preventDefault()

        jQuery('.js_tabs a').removeClass('isolate border-transparent bg-neutral-100')
        jQuery(this).addClass('isolate border-transparent bg-neutral-100')

        var id = jQuery(this).attr('href')
        jQuery('.js_tabContent').hide()
        jQuery('#'+id+ '.js_tabContent').show()
    })

    jQuery('.copy').on('click', function(e) {
        var element = jQuery(this).attr('data-element')
        var textToCopy = jQuery('body #' + element).val()
        const tempInput = document.createElement('textarea')

        tempInput.value = textToCopy
        document.body.appendChild(tempInput)
        tempInput.select()
        // Pour les appareils mobiles
        tempInput.setSelectionRange(0, 99999)
        document.execCommand('copy')
        document.body.removeChild(tempInput)
        alert("copié!")
    })
})