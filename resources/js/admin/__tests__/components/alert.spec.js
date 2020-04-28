import React from "react";
import {fireEvent, render} from "@testing-library/react";
import Alert from "../../components/alert";

describe('<Alert/>', () => {
    test('onActionClick callback called when action is clicked', () => {
        const onActionClick = jest.fn()
        const {getByText} = render(<Alert message="Alert"
                      actionText="Action button"
                      onActionClick={onActionClick}
                      showing={true}
                      timeout={10000}/>)

        fireEvent.click(getByText("Action button"))

        expect(onActionClick).toHaveBeenCalledTimes(1)
    })
})
