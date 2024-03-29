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


const slider = document.getElementById('slider');

if(slider) {
    const min = document.getElementById('search_form_min')
    const max = document.getElementById('search_form_max')
    const minValue = Math.floor(parseInt(slider.dataset.min, 10) / 10) * 10
    const maxValue = Math.ceil(parseInt(slider.dataset.max, 10) / 10) * 10
    const euroPrefixFormat = wNumb({prefix: '€', decimals: 0})
    const range = noUiSlider.create(slider, {
        start: [/*1000, 100000 */min.value || minValue, max.value || maxValue],
        connect: true,
        //step: 3,
        //decimals: 3,
        thousand: 1,
        //number_format :(2, ',', ','),
        //suffix: '€',
        tooltips: [euroPrefixFormat, euroPrefixFormat],
        pips: {

            format: euroPrefixFormat
        },
        range: {
            'min': /*minValue, */1000,
            'max': /*maxValue  */100000
        },

    });

    range.on('slide', function(values, handle) {
        console.log(values, handle);
         if(handle === 0){
             min.value = Math.round(values[0])
         }
        if(handle === 1){
            max.value = Math.round(values[1])
        }
    })



//km slider
    const kmSlider = document.getElementById('kmSlider');

    if(kmSlider){
            const minKm = document.getElementById('search_form_minKm')
            const maxKm = document.getElementById('search_form_maxKm')
            const range = noUiSlider.create(kmSlider, {
            start: [1000, 300000 /*min.value || minValue, max.value || maxValue*/],
            connect: true,
            step: 3,
            range: {
                'min': /*minValue, */1000,
                'max': /*maxValue  */300000
            }

        });


        range.on('slide', function(values, handle) {
            console.log(values, handle);
            if(handle === 0){
                minKm.value = Math.round(values[0])
            }
            if(handle === 1){
                maxKm.value = Math.round(values[1])
            }

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
        //const year = document.getElementById('search_form_year_year')
        //const yearsFormat = wNumb({ decimals: 0})
        const years = [
                "2009", "2010", "2011",
                "2012", "2013", "2014",
                "2015","2016", "2017", "2018",
                "2019","2020", "2021", "2022",
                "2023", "2024"
        ]
        const range = noUiSlider.create(yearSlider, {
            // Two more timestamps indicate the handle starting positions.
            start: [timestamp('2009'), timestamp('2024')],
            connect: true,
            step: 7 * 24 * 60 * 60 * 1000,
            range: {
                min: timestamp('2009'),
                max: timestamp('2024')
            },
            format: wNumb({
                decimals: 0
            }),

            /*yearSlider:noUiSlider.on('update', function (values, handle) {
                dateValues[handle].innerHTML = formatter.format(new Date(+values[handle]));
            }),*/



        });
        range.on('slide', function(values, handle) {
            console.log(values, handle);
            if(handle === 0){
                minYear.value = (values[0])
            }
            if(handle === 1){
                maxYear.value = (values[1])
            }
        })

        /*const dateValues = [
            document.getElementById('event-start'),
            document.getElementById('event-end')
        ];

        const formatter = new Intl.DateTimeFormat('fr-FR', {
            dateStyle: 'full'
        });

        yearSlider.noUiSlider.on('update', function (values, handle) {
            dateValues[handle].innerHTML = formatter.format(new Date(+values[handle]));
        });*/


    }

}













/*const slider = document.getElementById('slider');
const range = document.getElementById('range');
const min = document.getElementById('min')
const max = document.getElementById('max')


noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    range: {
        'min': slider.dataset.min,
        'max': slider.dataset.max
    }
});

noUiSlider.create(range, {

    range: {
        'min': 1000,
        'max': 100000
    },

    step: 150,

    // Handles start at ...
    /*start: [min.value || 0, max.value || 100000 ],*

    // ... must be at least 300 apart
    margin: 300,

    // ... but no more than 600
    limit: 600,





});*/






/*const slider = document.getElementById('slider');
const range = document.getElementById('range');

if(slider) {
    const min = document.getElementById('min')
    const max = document.getElementById('max')
    const range =noUiSlider.create(slider,{
        start: [min.value || 0, max.value || 100000 ],
        connect: true,
        step: 100,
        range: {
            'min': parseInt(slider.dataset.min,10),
            'max': parseInt(slider.dataset.max,10)
    }

})

    range.on('slide', function(values, handle) {

    })
   ;

}*/