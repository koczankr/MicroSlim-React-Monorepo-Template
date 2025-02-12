import React, { useState, Suspense } from "react";
import { fetchApiData } from "./apiService";

// Mikrofrontendek dinamikus betöltése
const PublicApp = React.lazy(() => import("micro_public/App"));
const PrivateApp = React.lazy(() => import("micro_private/App"));

function App() {
  const [apiResponse, setApiResponse] = useState("");

  const handleApiRequest = async (endpoint) => {
    const data = await fetchApiData(endpoint);
    setApiResponse(data.message);
  };

  return (
    <div style={{ textAlign: "center", padding: "20px" }}>
      <h1>MicroSlim Shell</h1>
      <button onClick={() => handleApiRequest("hello")}>API Hello</button>
      <button onClick={() => handleApiRequest("public")}>Load Public API</button>
      <button onClick={() => handleApiRequest("private")}>Load Private API</button>
      <div style={{ marginTop: "10px", padding: "10px", border: "1px solid black" }}>
        <p><strong>API Válasz:</strong> {apiResponse}</p>
      </div>

      <h2>Microfrontends</h2>
      <Suspense fallback={<p>Loading Public App...</p>}>
        <PublicApp />
      </Suspense>
      <Suspense fallback={<p>Loading Private App...</p>}>
        <PrivateApp />
      </Suspense>
    </div>
  );
}

export default App;