import React from "react"
import {render} from "@testing-library/react"
import {toHaveClass} from "@testing-library/jest-dom"
import MissionCard from "../../components/mission-card"

describe('<MissionCard/>', () => {
    test('Renders date correctly', () => {
        const date = new Date()
        const {getByTestId} = render(<MissionCard date={date}/>)

        expect(getByTestId('day')).toHaveTextContent(date.getDay())
        expect(getByTestId('year')).toHaveTextContent(date.getFullYear())
        expect(getByTestId('month')).toHaveTextContent(date.getMonth() + 1)
    })

    test(`renders '-' when date is null`, () => {
        const {getByTestId} = render(<MissionCard/>)

        expect(getByTestId('day')).toHaveTextContent('-')
        expect(getByTestId('year')).toHaveTextContent('-')
        expect(getByTestId('month')).toHaveTextContent('-')
    })

    test(`description preview (first p tag's content) rendered`, () => {
        const description = `
            <span>Ble ble</span>
            <p>This is the heading of the mission's description.</p>
            <p>This is more content of the mission description.</p>
            <p>This is more content of the mission description.</p>
        `
        const {getByTestId} = render(<MissionCard description={description}/>)

        expect(getByTestId('description')).toHaveTextContent(
            `This is the heading of the mission's description.`
        )
    })

    test(`renders '[no-description]' when description is null`, () => {
        const {getByTestId} = render(<MissionCard/>)

        expect(getByTestId('description')).toHaveTextContent('')
    })
})
