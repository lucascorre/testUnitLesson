import React from 'react';
import { render, screen } from '@testing-library/react';
import App from './App';
import Home from './components/Home';
import Cart from './components/Cart';

let container: any;

beforeEach(() => {
  container = document.createElement("div");
  document.body.appendChild(container);
});

test('App view', () => {
  const { container } = render(<App />);
  const title = screen.getByText(/Aller sur panier/i);
  expect(title).toBeInTheDocument();
});

test('Home view', () => {
  const { container } = render(<Home setRoute={(data: any): void => {}} />);
  const title = screen.getByText(/Aller sur panier/i);
  expect(title).toBeInTheDocument();
});

test('Cart view', () => {
  const { container } = render(<Cart setRoute={(data: any): void => {}} />);
  const title = screen.getByText(/Retour/i);
  expect(title).toBeInTheDocument();
});
