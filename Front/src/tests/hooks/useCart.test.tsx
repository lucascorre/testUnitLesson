import useCart from "../../hooks/useCart";
import {
    renderHook
} from '@testing-library/react-hooks';
import {
    act
} from 'react-dom/test-utils';

test("loading", async () => {
    const {
        result
    } = renderHook(() => useCart());
    const {
        loading,
        loadCart
    } = result.current;
    expect(loading).toEqual(true);
    await act(async () => {
        await loadCart()
    });
    const {
        products
    } = result.current;
    console.log(products);
});