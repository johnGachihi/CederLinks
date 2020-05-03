import React from "react";
import { fireEvent, render, queryHelpers } from "@testing-library/react";
import { waitFor, queryByAttribute } from "@testing-library/dom";
import { toHaveClass } from "@testing-library/jest-dom";
import Alert from "../../components/alert";

describe("<Alert/>", () => {
    test("onActionClick callback called when action is clicked", () => {
        const onActionClick = jest.fn();
        const { getByText } = render(
            <Alert
                message="Alert"
                actionText="Action button"
                onActionClick={onActionClick}
                showing={true}
                timeout={10000}
            />
        );

        fireEvent.click(getByText("Action button"));

        expect(onActionClick).toHaveBeenCalledTimes(1);
    });

    test("onClose called when alert closes", async () => {
        const onOpening = jest.fn();
        const onOpen = jest.fn();
        const onClosing = jest.fn();
        const onClose = jest.fn();

        render(
            <Alert
                message="Alert"
                showing={true}
                onOpening={onOpening}
                onOpen={onOpen}
                onClosing={onClosing}
                onClose={onClose}
            />
        );

        await waitFor(() => expect(onOpening).toBeCalledTimes(1));
        await waitFor(() => expect(onOpen).toBeCalledTimes(1));
        await waitFor(() => expect(onClosing).toBeCalledTimes(1), {
            timeout: 4700
        });
        await waitFor(() => expect(onClose).toBeCalledTimes(1), {
            timeout: 4700
        });
    });
});
