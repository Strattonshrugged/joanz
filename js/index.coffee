class CharmsViewModel
    constructor: ->
        @charms = [
            { 
                type: 'Single Charm' 
                imgUrl:  'images/single_charm.jpg'
                url: 'customize.php?type=single'
                selected: ko.observable(true)
                summaryNote: 'Single'
            }
            { 
                type: 'Double Charm' 
                imgUrl:  'images/double_charm.jpg'
                url: 'customize.php?type=double'
                selected: ko.observable(false)
                summaryNote: 'Double'
            }
        ]
        @letterings = [
            { 
                imgUrl:  'images/small_type.jpg'
                label: 'small letters'
                selected: ko.observable(true)
                lettering: ko.observable('')
                summaryNote: 'Small Letters'
            }
            { 
                imgUrl:  'images/large_type.jpg'
                label: 'LARGE letters'
                selected: ko.observable(false)
                lettering: ko.observable('')
                summaryNote: 'Large Letters'
            }
            {
                imgUrl:  'images/mixed_type.jpg'
                label: 'MiXeD letters'
                selected: ko.observable(false)
                lettering: ko.observable('')
                summaryNote: 'Mixed Letters'
            }
        ]
        @borders = [
            {
                imgUrl: 'images/dots.jpg'
                label: 'Yes, please add a dot border'
                selected: ko.observable(true)
                summaryNote: 'Dotted Border'
            }
            {
                imgUrl: 'images/no_dots.jpg'
                label: 'No border, please'
                selected: ko.observable(false)
                summaryNote: 'No Border'
            }
        ]
        @chains = [
            {
                imgUrl: 'images/7_inch_chain.jpg'
                label: 'Ball Chain (7 inches)'
                sublabel: '12.00'
                selected: ko.observable(false)
                summaryNote: '7-inche ball chain'
            }
            {
                imgUrl: 'images/20_inch_chain.jpg'
                label: 'Ball Chain (20 inches)'
                sublabel: '$23.00'
                selected: ko.observable(true)
                summaryNote: '20-inche ball chain'
            }
            {
                imgUrl: 'images/no_chain.jpg'
                label: 'No Chain'
                sublabel: ''
                selected: ko.observable(false)
                summaryNote: '(chain not included)'
            }
        ]
        @hearts = [
            {
                imgUrl: 'images/heart_charm_spacer.jpg'
                label: 'Yes, add a heart charm'
                sublabel: '+$20.00'
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
                    engraving = lettering.lettering()

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
                engraving: engraving
                borderStyle: borderStyle
                chainStyle: chainStyle
                includeHeart: includeHeart
                price: '$39'
            }
        )

        # initialize the shopping cart from pre-existing cookie
        cart = @_getShoppingCartData()
        @shoppingCart = ko.observableArray([])

        @addToCart = (viewModel, event) ->
            # get user confirmation before adding to the cart
            for lettering in viewModel.letterings
                if lettering.selected()
                    engraving = lettering.lettering()
            if engraving is ""
                engraving = "no engraving"
            else
                engraving = "engraving \"#{engraving}\""
            return unless window.confirm("Are you sure you want to add this charm with #{engraving} to the cart?")
            
            item = viewModel.selectedSummary()

            cart = @_getShoppingCartData()
            cart.push(item)
            @activeCart(cart)

            # also store it locally for page reloads
            @_setShoppingCartData(cart)

        @removeItem = (index) =>
            return unless window.confirm("Are you sure you want to remove this item from your cart?")
            
            cart = @_getShoppingCartData()
            cart.splice(index, 1)
            @activeCart(cart)

            # also update it locally for page reloads
            @_setShoppingCartData(cart)

        @emptyCart = (viewModel, event) ->
            return unless window.confirm("Are you sure you remove all items from your cart?")
            
            @activeCart([])

            # also clear the data stored in the browser
            @_setShoppingCartData([])

        @checkout = (viewModel, event) ->
            console.log('checkout!')

        # initialize the cart with what's stored locally
        @activeCart = ko.observableArray(@_getShoppingCartData())

        @hasCartItems = ko.computed(=>
            return @activeCart().length > 0
        )

        @summarizeItem = (item) ->
            summary = "A <b>#{item.charmStyle.toLowerCase()}</b> charm"
            if item.engraving is ""
                summary += " with no engraving.  "
            else
                summary += " with a <b>#{item.borderStyle.toLowerCase()}</b> engraved with <b>\"#{item.engraving}\"</b>"
                summary += " in <b>#{item.letteringStyle.toLowerCase()}</b>.  "

            if item.includeHeart isnt "No"
                summary += "Includes a heart charm"
                if item.chainStyle isnt "No Chain"
                    summary += " and a #{item.chainStyle.toLowerCase()}."
                else
                    summary += "."
            else if item.chainStyle isnt "No Chain"
                summary += "Includes a #{item.chainStyle.toLowerCase()}."

            return summary

    # retrieves the cart data stored as JSON in a cookie and returns
    # it as a javascript object
    _getShoppingCartData: ->
        dataStr = $.cookie('shopping_cart')
        return [] unless dataStr?
        
        data = JSON.parse(dataStr)
        if not Array.isArray(data)
            console.log('no shopping cart data')
            data = []

        return data

    # converts the shopping cart data to JSON and stores it in a cookie
    _setShoppingCartData: (data) ->
        #console.log('setting shopping cart data')
        $.cookie('shopping_cart', JSON.stringify(data))

ready = ->
    ko.applyBindings(new CharmsViewModel())

$(document).ready(ready)
$(document).on('page:load', ready)
