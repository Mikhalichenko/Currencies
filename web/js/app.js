(function ($) {

    'use strict';

    var App = {

        init: function () {
            this.accordion();
            this.addToFavorites();
            this.checkSelectedCurrencies();
            this.deleteSelectedCurrencies();
        },

        cache: {
            detailAccordion:  $('[id^=detail-]'),
            toggleAccordion:  $('.toggle'),

            currency:         $('.currency'),
            paymentsModal:    $('#paymentsModal'),
            area:             $('#area')
        },

        accordion: function () {
            this.cache.detailAccordion.hide();
            this.cache.toggleAccordion.on('click', function(e) {
                e.preventDefault();
                var $input = $( this ),
                    $target = $('#'+$input.attr('data-toggle'));
                $target.slideToggle();
            });
        },

        addToFavorites: function () {
            var that = this;
            this.cache.currency.on('click', function (e) {
               e.preventDefault();
               var currencyId = $(this).attr('data-id');

               if (that.addToLocalStorage(currencyId)) {
                   that.cache.paymentsModal.modal('toggle');
                   $.ajax({
                       url: '/getCurrencies',
                       data: { id: currencyId },
                       method: 'post',
                       dataType: 'json',
                       success: function (res) {
                           that.addSelectedCurrencies(res);
                       }
                   })
               }
            });
        },

        checkSelectedCurrencies: function () {
            var storage = localStorage.getItem('_favorites'),
                data = [];
            data = JSON.parse(storage);
            if (storage && data.length > 0){
                $.ajax({
                    url: '/getCurrencies',
                    data: { id: data },
                    method: 'post',
                    dataType: 'json',
                    success: function (res) {
                        App.addSelectedCurrencies(res);
                    }
                })
            }
        },
        
        addSelectedCurrencies: function (res) {
            var that = this;
            $.each(res, function (key, val) {
                var new_row = '<div class="col-md-12">' +
                                    '<div class="update-nag">' +
                                            '<div class="update-split"><img class="pey-icon" src="/uploads/' + val.img + '" alt=""></div>' +
                                            '<div class="update-text"><b>' + val.name + ' ' +  val.currenciesName + ' </b><a href="#" data-id="' + val.id + '" class="delete-currencies"> <i class="glyphicon glyphicon-trash"></i></a></div>' +
                                    '</div>' +
                              '</div>';

                $(that.cache.area).append(new_row);
            });
        },

        addToLocalStorage: function (id) {

            var storage = localStorage.getItem('_favorites'),
                data = [];

            storage ? data = JSON.parse(storage): '';

            if (data.indexOf(id) == -1) {
                data.push(id);
            } else {
                return false;
            }
            localStorage.setItem('_favorites', JSON.stringify(data));
            return true;
        },

        deleteSelectedCurrencies: function () {
            var that = this;
            $(document).on('click', '.delete-currencies', function (e) {
                var id = $(this).attr('data-id');
                e.preventDefault();
                $(this).closest('.col-md-12').html('');
                that.deleteFromLocalStorage(id)
            });
        },

        deleteFromLocalStorage: function (id) {
            var storage = localStorage.getItem('_favorites'),
                data = [];

            storage ? data = JSON.parse(storage): '';

            if (data.indexOf(id) != -1) {
                data.splice( $.inArray(id, data), 1 );
            }

            localStorage.setItem('_favorites', JSON.stringify(data));
            return true;

        }
    };

    App.init();

}(jQuery));
