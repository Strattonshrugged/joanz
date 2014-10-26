class CharmsViewModel
    constructor: ->
        @letterings = [
            { 
                imgUrl:  'images/single_charm_select.jpg'
                label: 'small letters'
                selected: ko.observable(true)
                lettering: ko.observable('hello')
            }
            { 
                imgUrl:  'images/single_charm_select.jpg'
                label: 'LARGE letters'
                selected: ko.observable(false)
                lettering: ko.observable('hello')
            }
            {
                imgUrl:  'images/single_charm_select.jpg'
                label: 'MiXeD letters'
                selected: ko.observable(false)
                lettering: ko.observable('hello')
            }
        ]
        @borders = [
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'Yes, please add a dot border'
                selected: ko.observable(true)
            }
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'No border, please'
                selected: ko.observable(false)
            }
        ]

        # hacky: make computed after so we can reference observables
        @letterings[0].remaining = ko.computed((foo) =>
            left = 10 - @letterings[0].lettering().length
            return left + ' characters remaining'
        )
        @letterings[1].remaining = ko.computed((foo) =>
            left = 10 - @letterings[1].lettering().length
            return left + ' characters remaining'
        )
        @letterings[2].remaining = ko.computed((foo) =>
            left = 10 - @letterings[2].lettering().length
            return left + ' characters remaining'
        )
        
        @selectLettering = (selectedLettering, event) =>
            for lettering in @letterings
                lettering.selected(lettering.label == selectedLettering.label)
                    
        @selectBorder = (selectedBorder, event) =>
            for border in @borders
                border.selected(border.label == selectedBorder.label)

ready = ->
    ko.applyBindings(new CharmsViewModel())

$(document).ready(ready)
$(document).on('page:load', ready)
