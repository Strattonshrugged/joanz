class CharmsViewModel
    constructor: (cartVM) ->
        @_cartVM = cartVM

        @isCustomState = ko.observable(false)

        @designCharmBtn = {
            type: 'Design a Custom Charm'
            imgUrl: 'images/single_charm.jpg'
            clickCallback: @_designCustomCharm
        }
        @heartCharmBtn = {
            type: 'Add a Heart Charm'
            imgUrl: 'images/heart_charm_spacer.jpg'
            clickCallback: @_addHeartCharm
        }

        @charms = [
            {
                type: 'Single Charm'
                imgUrl:  'images/single_charm.jpg'
                selected: ko.observable(false)
                summaryNote: 'Single'
                sublabel: '+$20.00'
                cost: 2000
            }
            {
                type: 'Double Charm'
                imgUrl:  'images/double_charm.jpg'
                selected: ko.observable(false)
                summaryNote: 'Double'
                sublabel: '+$23.00'
                cost: 2300
            }
        ]
        @letterings = [
            {
                imgUrl:  'images/small_type.jpg'
                label: 'small letters'
                selected: ko.observable(false)
                lettering: ko.observable('')
                summaryNote: 'Small Letters'
                maxLetters: 8
            }
            {
                imgUrl:  'images/large_type.jpg'
                label: 'LARGE letters'
                selected: ko.observable(false)
                lettering: ko.observable('')
                summaryNote: 'Large Letters'
                maxLetters: 4
            }
            {
                imgUrl:  'images/mixed_type.jpg'
                label: 'MiXeD letters'
                selected: ko.observable(false)
                lettering: ko.observable('')
                summaryNote: 'Mixed Letters'
                maxLetters: 5
            }
        ]
        @borders = [
            {
                imgUrl: 'images/dots.jpg'
                label: 'Yes, add a dot border'
                selected: ko.observable(false)
                summaryNote: 'a dotted border'
            }
            {
                imgUrl: 'images/no_dots.jpg'
                label: 'No border, please'
                selected: ko.observable(false)
                summaryNote: 'no border'
            }
        ]
        @chains = [
            {
                imgUrl: 'images/20_inch_chain.jpg'
                label: 'Necklace (20 inches)'
                sublabel: '+$23.00'
                selected: ko.observable(false)
                summaryNote: '20-inch necklace'
                cost: 2300
            }
            {
                imgUrl: 'images/7_inch_chain.jpg'
                label: 'Bracelet (7.5 inches)'
                sublabel: '+$12.00'
                selected: ko.observable(false)
                summaryNote: '7-inch bracelet'
                cost: 1200
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
                cost: 2000
            }
            {
                imgUrl: 'images/single_charm_select.jpg'
                label: 'No heart charm, please'
                sublabel: ''
                selected: ko.observable(false)
                summaryNote: 'No'
            }
        ]

        # hacky: make computed after so we can reference observables
        for lettering in @letterings
            lettering.remaining = do (lettering) => ko.computed((foo) =>
                left = lettering.maxLetters - lettering.lettering().length
                return left + ' characters remaining'
            )

        @selectCharm = (selectedCharm, event) =>
            for charm in @charms
                charm.selected(charm.type == selectedCharm.type)

            return true

        @selectLettering = (selectedLettering, event) =>
            for lettering in @letterings
                lettering.selected(lettering.label == selectedLettering.label)

            return true

        @selectBorder = (selectedBorder, event) =>
            for border in @borders
                border.selected(border.label == selectedBorder.label)

            return true

        @selectChain = (selectedChain, event) =>
            for chain in @chains
                chain.selected(chain.label == selectedChain.label)

            return true

        @selectHeart = (selectedHeart, event) =>
            for heart in @hearts
                heart.selected(heart.label == selectedHeart.label)

            return true

    resetWizard: ->
        # clear selections
        for charm in @charms
            charm.selected(false)
        for lettering in @letterings
            lettering.selected(false)
            lettering.lettering('')
        for border in @borders
            border.selected(false)
        for chain in @chains
            chain.selected(false)
        for heart in @hearts
            heart.selected(false)

    # converts a money string '$39.00' to an int, returns 0 for empty string
    _sublabelToCost: (sublabel) ->
        return 0 if sublabel is ''
        return parseInt(sublabel.replace('$', '').replace('+', ''), 10)

    _getSelected: (array) ->
        for elem in array
            return elem if elem.selected()
        return false

    _designCustomCharm: =>
         $("#custom-charm-wizard-dialog").dialog("open")

    _addHeartCharm: =>
        @_cartVM.addToCart('A heart charm', 2000, 'heart charm')

    addCustomToCart: ->
        total = 0

        # add the charm to summary and item cost
        #
        charm = @_getSelected(@charms)
        summary = "A #{charm.type.toLowerCase()}"
        total += charm.cost

        # add the engraving to summary
        #
        lettering = @_getSelected(@letterings)
        if lettering.lettering() is ''
            summary += " with no engraving"
        else
            summary += " engraved with '#{lettering.lettering()}' in #{lettering.label.toLowerCase()}"

        # add border to summary
        #
        border = @_getSelected(@borders)
        summary += " with #{border.summaryNote}"

        # add heart and chain to summary and cost
        #
        heart = @_getSelected(@hearts)
        chain = @_getSelected(@chains)

        unless 'no' in heart.label.toLowerCase() and 'no' in chain.label.toLowerCase()
            summary += " -- includes"

            hasHeartCharm = heart.label.toLowerCase().indexOf('no') < 0
            hasChain = chain.label.toLowerCase().indexOf('no') < 0

            if hasHeartCharm
                summary += " a heart charm"
                total += heart.cost

            if hasHeartCharm and hasChain
                summary += " and "

            if hasChain
                summary += " a #{chain.summaryNote.toLowerCase()}"
                total += chain.cost

        @_cartVM.addToCart(summary, total, summary)

        # clear wizard
        @resetWizard()

class CartViewModel
    constructor: ->
        # initialize the shopping cart from pre-existing cookie
        cart = @_getShoppingCartData()

        # initialize the cart with what's stored locally
        @activeCart = ko.observableArray(cart)

        @hasCartItems = ko.computed(=>
            return @activeCart().length > 0
        )

        @cartTotal = ko.computed(=>
            total = 0
            for item in @activeCart()
                total += item.localPrice

            return total
        )

    addToCart: (localSummary, localPrice, paypalSummary) ->
        cart = @_getShoppingCartData()
        cart.push({
            localSummary: localSummary
            localPrice: localPrice
            paypalSummary: paypalSummary
            paypalPrice: @centsToPrice(localPrice, false)
        })
        @activeCart(cart)

        # also store it locally for page reloads
        @_setShoppingCartData(cart)

    removeItem: (index) =>
        return unless window.confirm("Are you sure you want to remove this item from your cart?")

        cart = @_getShoppingCartData()
        cart.splice(index, 1)
        @activeCart(cart)

        # also update it locally for page reloads
        @_setShoppingCartData(cart)

    emptyCart: (viewModel, event) ->
        return unless window.confirm("Are you sure you remove all items from your cart?")

        @activeCart([])

        # also clear the data stored in the browser
        @_setShoppingCartData([])

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

    centsToPrice: (cents, includeDollarSign = true) ->
        dollars = cents / 100
        cents = cents % 100
        if cents < 10
            cents = cents + '0'
        value = "#{dollars}.#{cents}"
        if includeDollarSign
            value = "$#{value}"
        return value




ready = ->
    # ported from stackoverflow question comment
    # http://stackoverflow.com/questions/12982587/how-to-build-a-textarea-with-character-counter-and-max-length
    # http://jsfiddle.net/R3Pxf/
    limitCharacters = (element, valueAccessor, allBindings, viewModel) =>
        allowedNumberOfCharacters = valueAccessor()
        currentValue = allBindings.get('textInput')
        cutText = ko.unwrap(currentValue).substr(0, allowedNumberOfCharacters)
        currentValue(cutText)

    ko.bindingHandlers.limitCharacters = {
        update: limitCharacters
    }

    wizardDialog = $("#custom-charm-wizard-dialog").dialog({
        draggable: false
        width: "90%"
        title: "Design a Custom Charm"
        autoOpen: false
    })

    cartVM = new CartViewModel()
    ko.applyBindings(cartVM, $('#cart-container')[0])

    charmsVM = new CharmsViewModel(cartVM)
    ko.applyBindings(charmsVM, $('#custom-charm-wizard-dialog')[0])
    ko.applyBindings(charmsVM, $('#initial-choices')[0])

    hasSelection = (array) ->
        for obj in array
            if obj.selected()
                return true
        alert('You must make a selection')
        return false

    #$("#custom-charm-wizard-dialog").dialog({ autoOpen: false })
    validateWizardStep = (elem, context) =>
        # always allow returning to previous page
        if context.fromStep > context.toStep
            return true

        switch context.fromStep
            when 1 # choose a charm
                return hasSelection(charmsVM.charms)
            when 2 # choose a lettering
                if hasSelection(charmsVM.letterings)
                    # TODO: check for a lettering?
                    return true
                else
                    return false
            when 3 # choose a border
                return hasSelection(charmsVM.borders)
            when 4
                return hasSelection(charmsVM.hearts)
        return false

    wizardScopeHack = []
    finishWizard = ->
        if hasSelection(charmsVM.chains)
            charmsVM.addCustomToCart()

            numSteps = 5
            wizardScopeHack[0].smartWizard('goToStep', 1)
            for i in [2..numSteps]
                console.log("disabling step: #{i}")
                wizardScopeHack[0].smartWizard('disableStep', i)

            $("#custom-charm-wizard-dialog").dialog("close")

    wizardScopeHack[0] = $("#custom-charm-wizard").smartWizard({
        onLeaveStep: validateWizardStep
        labelFinish: 'Add to Cart'
        onFinish: finishWizard
    })



$(document).ready(ready)
$(document).on('page:load', ready)
