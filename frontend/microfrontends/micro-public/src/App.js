import React, { useState, useEffect } from "react";
import { fetchApiData } from "./apiService";

function PublicApp() {
  const [publicData, setPublicData] = useState("");

  useEffect(() => {
    fetchApiData("public").then(data => setPublicData(data.message));
  }, []);

  return (
    <div style={{ border: "1px solid blue", padding: "10px", margin: "10px" }}>
      <h2>Public Microfrontend</h2>
      <div style={{ padding: "5px", border: "1px solid black" }}>
        <p><strong>API Public válasz:</strong> {publicData}</p>
      </div>
    </div>
  );
}

export default PublicApp;