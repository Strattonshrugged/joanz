class CharmsViewModel
    constructor: ->
        @charms = [
            { 
                type: 'Single Charm' 
                imgUrl:  'images/single_charm_select.jpg'
                url: 'customize.php?type=single'
            }
            { 
                type: 'Double Charm' 
                imgUrl:  'images/double_charm_select.jpg'
                url: 'customize.php?type=double'
            }
        ]
    

ready = ->
    ko.applyBindings(new CharmsViewModel())


$(document).ready(ready)
$(document).on('page:load', ready)
