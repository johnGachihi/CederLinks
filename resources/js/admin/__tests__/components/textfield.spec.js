import React from 'react'
import {shallow} from 'enzyme'
import TextField from "../../components/textfield";

describe('<TextField/>', () => {
    test('placeholder prop applied to input element', () => {
        const textField = shallow(<TextField placeholder="placeholder"/>)
        expect(textField.find('input').prop('placeholder'))
            .toBe('placeholder')
    })

    test('onChange prop called on input change', () => {
        const mockOnChange = jest.fn()
        const textField = shallow(<TextField onTextChange={mockOnChange}/>)

        textField.find('input').simulate('change', { target: { value: "foo" }})

        expect(mockOnChange).toHaveBeenCalledWith("foo")
    })
})
