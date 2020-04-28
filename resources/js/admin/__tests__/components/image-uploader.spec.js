import React from 'react'
import {fireEvent, render} from '@testing-library/react'
import {toHaveAttribute} from '@testing-library/jest-dom'
import ImageUploader from "../../components/image-uploader";

describe('<ImageUploader/>', () => {
    test('Given image prop is of type string, then img src will be image prop as is', () => {
        const {getByAltText} = render(<ImageUploader image="/image/url"/>)

        expect(getByAltText(/Mission image/i))
            .toHaveAttribute('src', '/image/url')
    })

    test('Given image prop is of type File, then img src will be URL.createObjectUrl(image)', () => {
        URL.createObjectURL = jest.fn(() => 'data://imageObjectUrl')
        const image = new File([""], "imagename", {type: 'image/jpeg'})
        const {getByAltText} = render(<ImageUploader image={image}/>)

        expect(getByAltText(/Mission image/i))
            .toHaveAttribute('src', 'data://imageObjectUrl')
    })

    test('URL.revokeObjectUrl called after img element loads', () => {
        URL.createObjectURL = jest.fn(() => 'data://imageObjectUrl')
        URL.revokeObjectURL = jest.fn()
        const image = new File([""], "imagename", {type: 'image/jpeg'})
        const {getByAltText} = render(<ImageUploader image={image}/>)

        fireEvent.load(getByAltText(/Mission image/i))

        expect(URL.revokeObjectURL).toHaveBeenCalledWith(URL.createObjectURL())
    })
})
