import React from 'react'
import {mount} from 'enzyme'
import DatePicker from "../../components/datepicker";
import {SingleDatePicker} from "react-dates";
import moment from "moment";

describe('<DatePicker/>', () => {
    let datePickerComponent
    let mockOnDateChange = jest.fn()
    let date = moment()

    beforeEach(() => {
        datePickerComponent = <DatePicker
            placeholder="placeholder"
            date={date}
            onDateChange={mockOnDateChange}
        />

        window.matchMedia = jest.fn(() => ({matches: true}))
    })

    describe('numberOfMonths on <SingleDatePicker/> changes with screen width', () => {
        test('Given min-width: 935px, numberOfMonths is 3', () => {
            window.matchMedia = minWidth935Px
            const datePicker = mount(datePickerComponent)

            expect(datePicker.find(SingleDatePicker).prop('numberOfMonths')).toBe(3)
        })

        test('Given min-width: 640px, numberOfMonths is 2', () => {
            window.matchMedia = minWidth640Px
            const datePicker = mount(datePickerComponent)

            expect(datePicker.find(SingleDatePicker).prop('numberOfMonths')).toBe(2)
        })

        test('Given width less than 640px, numberOfMonths is 1', () => {
            window.matchMedia = minWidth0Px
            const datePicker = mount(datePickerComponent)

            expect(datePicker.find(SingleDatePicker).prop('numberOfMonths')).toBe(1)
        })
    })

    test('Inner <SingleDatePicker/> has provided placeholder', () => {
        const datePicker = mount(datePickerComponent)

        expect(datePicker.find(SingleDatePicker).prop('placeholder')).toBe('placeholder')
    })

    test('Inner <SingleDatePicker/> has provided date', () => {
        const datePicker = mount(datePickerComponent)

        expect(datePicker.find(SingleDatePicker).prop('date')).toBe(date)
    })

    test('onDateChange prop called on on-date-change event', () => {
        const datePicker = mount(datePickerComponent)
        const _moment = moment()

        datePicker.find(SingleDatePicker).prop('onDateChange')(_moment)

        expect(mockOnDateChange).toHaveBeenCalledWith(_moment)
    })

})

const minWidth935Px = jest.fn(query => {
    if (query === '(min-width: 935px)')
        return {matches: true}
    else
        return {matches: false}
})

const minWidth640Px = jest.fn(query => {
    if (query === '(min-width: 640px)')
        return {matches: true}
    else
        return {matches: false}
})

const minWidth0Px = jest.fn(query => {
    if (query !== '(min-width: 935px)' &&
        query !== '(min-width: 640px)')
    {
        return {matches: true}
    } else {
        return {matches: false}
    }
})
