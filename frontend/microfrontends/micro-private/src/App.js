import React, { useState, useEffect } from "react";
import { fetchApiData } from "./apiService";

function PrivateApp() {
  const [privateData, setPrivateData] = useState("");

  useEffect(() => {
    fetchApiData("private").then(data => setPrivateData(data.message));
  }, []);

  return (
    <div style={{ border: "1px solid red", padding: "10px", margin: "10px" }}>
      <h2>Private Microfrontend</h2>
      <div style={{ padding: "5px", border: "1px solid black" }}>
        <p><strong>API Private válasz:</strong> {privateData}</p>
      </div>
    </div>
  );
}

export default PrivateApp;