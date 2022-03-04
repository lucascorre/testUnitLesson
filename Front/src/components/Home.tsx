import React, { useEffect, useState } from "react";
import { endpoint, Product } from "../App";

const Home = ({ setRoute }: { setRoute: (data: any) => void }) => {
  const [loading, setLoading] = useState<boolean>(true);
  const [products, setProducts] = useState<Product[]>([]);

  useEffect(() => {
    fetch(`${endpoint}/products`)
      .then((res) => res.json())
      .then((res) => {
        setLoading(false);
        setProducts(res);
      });
  }, []);

  return (
    <div>
      {loading && <div>Loading....</div>}
      <div className="btn btn-primary" onClick={() => setRoute({ route: "cart" })}>Aller sur panier</div>
      <div className="row row-cols-1 row-cols-md-4 g-4">
        {products.map((product) => {
          return (
            <React.Fragment>
                <div className="col d-flex justify-content-center">
                  <div className="card" style={{ width: "18rem" }} onClick={() => setRoute({ route: "product", data: product })}>
                    <img src={product.image} className="card-img-top" alt="" />
                    <div className="card-body">
                      <h5 className="card-title"><p>Figurine de {product.name}</p></h5>
                      <p className="card-text"><p>Quantitée {product.quantity}</p></p>
                      <a href="#" className="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>

            </React.Fragment>
          );
        })}
      </div>
    </div >
  );
};

export default Home;
