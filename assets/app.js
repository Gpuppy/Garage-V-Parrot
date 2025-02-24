/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


// assets/app.js
//import { startStimulusApp } from '@symfony/stimulus-bridge';

/*export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.(j|t)sx?$/
));*/

import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';
import wNumb from 'wnumb';
import Filter from './styles/modules/Filter'

new Filter(document.querySelector('.js-filter'))


const priceSlider = document.getElementById('priceSlider');

if(priceSlider) {
    const minPrice = document.getElementById('search_form_minPrice')
    const maxPrice = document.getElementById('search_form_maxPrice')
    const minPriceValue = Math.floor(parseInt(priceSlider.dataset.min, 10) / 10) * 10
    const maxPriceValue = Math.ceil(parseInt(priceSlider.dataset.max, 10) / 10) * 10
    const euroPrefixFormat = wNumb({prefix: '€', decimals: 0})
    const range = noUiSlider.create(priceSlider, {
        start: [1000, 10000000 /*minPrice.value || minPriceValue, maxPrice.value || maxPriceValue*/],
        connect: true,
        step: 3,
        //decimals: 3,
        thousand: 1,
        number_format: (2, ',', ','),
        suffix: '€',
        tooltips: [euroPrefixFormat, euroPrefixFormat],
        /*pips: {
            format: euroPrefixFormat
        },*/
        range: {
            'min': /*minValue, */1000,
            'max': /*maxValue  */10000000
        },

    });

    range.on('slide', function (values, handle) {
        //console.log(values, handle);
        if (handle === 0) {
            minPrice.value = Math.round(values[0])
        }
        if (handle === 1) {
            maxPrice.value = Math.round(values[1])
        }

    })
    range.on('end', function (values, handle) {
        minPrice.dispatchEvent(new Event('change', {bubbles: true}))
        maxPrice.dispatchEvent(new Event('change', {bubbles: true}))
        //if(handle === 1){min.dispatchEvent(new Event('change',))}
//if(handle === 1){max.dispatchEvent(new Event('change',))}

        //console.log('Event triggered')

    })

//km slider
    const kmSlider = document.getElementById('kmSlider');

    if (kmSlider) {
        const minKm = document.getElementById('search_form_minKm')
        const maxKm = document.getElementById('search_form_maxKm')
        //const kmPrefixFormat = wNumb({suffix: 'km', decimals: 0})
        const range = noUiSlider.create(kmSlider, {
            start: [1000, 350000 /*min.value || minValue, max.value || maxValue*/],
            connect: true,
            step: 3,
            tooltips: true,
            range: {
                'min': /*minValue, */1000,
                'max': /*maxValue  */350000
            },
            // if removed we get the values in the "search_form_km"
            /*format : wNumb({
                decimals:0,
                suffix:'Km'
            })*/
        });

        range.on('slide', function (values, handle) {
            //console.log(values, handle);
            if (handle === 0) {
                minKm.value = Math.round(values[0])
            }
            if (handle === 1) {
                maxKm.value = Math.round(values[1])
            }

        })
        range.on('end', function (values, handle) {
            minKm.dispatchEvent(new Event('change', {bubbles: true}))
            maxKm.dispatchEvent(new Event('change', {bubbles: true}))

        })


    }

//Year slider

    const yearSlider = document.getElementById('yearSlider');
    function timestamp(str) {
        return new Date(str).getTime();
    }

    if(yearSlider){
        const minYear = document.getElementById('search_form_minYear')
        const maxYear = document.getElementById('search_form_maxYear')
        const range = noUiSlider.create(yearSlider, {
            // Two more timestamps indicate the handle starting positions.
            //start: [timestamp('2001-01-01'), timestamp('2024-12-30')],
            start: [timestamp('2007-01-01'),timestamp('2024-12-30')],
            //start: [1266137081781,1704067200000],
            connect: true,
            //step: 7 * 24 * 60 * 60 * 1000,
            range: {
                //min: timestamp('2001-01-01'),
                //max: timestamp('2024-12-30')
                min: timestamp('2007-01-01'),
                max: timestamp('2024-12-30')
            },

            format: wNumb({
                decimals: 0
            }),
            step: 1,
            tooltips: {
                to:yearFormat // customtooltip formatting function for displaying years
            }

        });


        function yearFormat(value) {
            return new Date(+value).getFullYear().toString();
        }
        range.on('slide', function(values, handle) {
            //console.log(values, handle);
            if(handle === 0){
                minYear.value = (values[0])
            }
            if(handle === 1){
                maxYear.value = (values[1])
            }

        })


        range.on('end', function(values,handle){
            minYear.dispatchEvent(new Event('change',{ bubbles: true }))
            maxYear.dispatchEvent(new Event('change',{ bubbles: true }))
            //if(handle === 1){min.dispatchEvent(new Event('change',))}


        })

    }

}
    /*const yearSlider = document.getElementById('yearSlider');

    if (yearSlider) {
        const minYear = document.getElementById('search_form_minYear');
        const maxYear = document.getElementById('search_form_maxYear');

        noUiSlider.create(yearSlider, {
            start: [parseInt(yearSlider.dataset.min), parseInt(yearSlider.dataset.max)],
            connect: true,
            step: 365 * 24 * 60 * 60 * 1000, // 1-year steps
            range: {
                min: parseInt(yearSlider.dataset.min),
                max: parseInt(yearSlider.dataset.max)
            },
            tooltips: [
                {
                    to: (value) => new Date(value).getFullYear(),
                    from: (value) => value
                },
                {
                    to: (value) => new Date(value).getFullYear(),
                    from: (value) => value
                }
            ],
            format: wNumb({
                decimals: 0 // Ensure no decimals in year output
            })
        });

        // Update the form inputs on slider events
        yearSlider.noUiSlider.on('update', function (values, handle) {
            const year = new Date(+values[handle]).getFullYear();
            if (handle === 0) {
                minYear.value = year;
            } else {
                maxYear.value = year;
            }
        });

        yearSlider.noUiSlider.on('end', function () {
            minYear.dispatchEvent(new Event('change', {bubbles: true}));
            maxYear.dispatchEvent(new Event('change', {bubbles: true}));
        });
    }
}*/
