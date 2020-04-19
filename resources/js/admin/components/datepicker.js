import React, {useState} from 'react'
import 'react-dates/initialize'
import {SingleDatePicker} from 'react-dates'
import 'react-dates/lib/css/_datepicker.css'
import '../../../sass/admin/datepicker.scss'

function DatePicker(props) {
    const [date, setDate] = useState(null)
    const [focused, setFocus] = useState(false)

    let numberOfMonths = 1
    if (window.matchMedia('(min-width: 935px').matches) {
        numberOfMonths = 3
    } else if (window.matchMedia('(min-width: 640px').matches) {
        numberOfMonths = 2
    }

    function handleDateChange(date) {
        setDate(date)
        props.onDateChange(date)
    }

    return (
        <SingleDatePicker
            placeholder={props.placeholder}
            date={date}
            onDateChange={handleDateChange}
            focused={focused}
            onFocusChange={focused => setFocus(focused.focused)}
            id={"theid12"}
            displayFormat={'Do MMMM YYYY'}
            withPortal
            numberOfMonths={numberOfMonths}
            showDefaultInputIcon
        />
    )
}

export default DatePicker
