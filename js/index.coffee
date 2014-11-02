class CharmsViewModel
    constructor: ->
        @charms = [
            { 
                type: 'Single Charm' 
                imgUrl:  'images/single_charm_select.jpg'
                url: 'customize.php?type=single'
                selected: ko.observable(true)
                summaryNote: 'Single'
            }
            { 
                type: 'Double Charm' 
                imgUrl:  'images/double_charm_select.jpg'
                url: 'customize.php?type=double'
                selected: ko.observable(false)
                summaryNote: 'Double'
            }
        ]
        @letterings = [
            { 
                imgUrl:  'images/single_charm_select.jpg'
                label: 'small letters'
                selected: ko.observable(true)
                lettering: ko.observable('hello')
                summaryNote: 'Small Letters'
            }
            { 
                imgUrl:  'images/single_charm_select.jpg'
                label: 'LARGE letters'
                selected: ko.observable(false)
                lettering: ko.observable('hello')
                summaryNote: 'Large Letters'
            }
            {
                imgUrl:  'images/single_charm_select.jpg'
                label: 'MiXeD letters'
                selected: ko.observable(false)
                lettering: ko.observable('hello')
                summaryNote: 'Mixed Letters'
            }
        ]
        @borders = [
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'Yes, please add a dot border'
                selected: ko.observable(true)
                summaryNote: 'Dotted Border'
            }
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'No border, please'
                selected: ko.observable(false)
                summaryNote: 'No Border'
            }
        ]
        @chains = [
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'Ball Chain (20 inches)'
                sublabel: '$23.00'
                selected: ko.observable(true)
                summaryNote: '20-inche ball chain'
            }
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'Ball Chain (7 inches)'
                sublabel: '12.00'
                selected: ko.observable(false)
                summaryNote: '7-inche ball chain'
            }
        ]
        @hearts = [
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'Yes, add a heart charm'
                sublabel: '+20.00'
                selected: ko.observable(false)
                summaryNote: 'Yes'
            }
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'No heart charm, please'
                sublabel: ''
                selected: ko.observable(true)
                summaryNote: 'No'
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

        @selectCharm = (selectedCharm, event) =>
            for charm in @charms
                charm.selected(charm.type == selectedCharm.type)

        @selectLettering = (selectedLettering, event) =>
            for lettering in @letterings
                lettering.selected(lettering.label == selectedLettering.label)
                    
        @selectBorder = (selectedBorder, event) =>
            for border in @borders
                border.selected(border.label == selectedBorder.label)

        @selectChain = (selectedChain, event) =>
            for chain in @chains
                chain.selected(chain.label == selectedChain.label)

        @selectHeart = (selectedHeart, event) =>
            for heart in @hearts
                heart.selected(heart.label == selectedHeart.label)

        @selectedSummary = ko.computed(=>
            for charm in @charms
                if charm.selected()
                    charmStyle = charm.summaryNote

            for lettering in @letterings
                if lettering.selected()
                    letteringStyle = lettering.summaryNote

            for border in @borders
                if border.selected()
                    borderStyle = border.summaryNote

            for chain in @chains
                if chain.selected()
                    chainStyle = chain.summaryNote

            if @hearts[0].selected()
                includeHeart = @hearts[0].summaryNote
            else
                includeHeart = @hearts[1].summaryNote
                
            return {
                charmStyle: charmStyle
                letteringStyle: letteringStyle
                borderStyle: borderStyle
                chainStyle: chainStyle
                includeHeart: includeHeart
            }
        )
        


ready = ->
    ko.applyBindings(new CharmsViewModel())


$(document).ready(ready)
$(document).on('page:load', ready)
