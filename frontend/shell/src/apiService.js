const API_GATEWAY_URL = "http://localhost:8000/api";

export const fetchApiData = async (endpoint) => {
  try {
    const response = await fetch(`${API_GATEWAY_URL}/${endpoint}`);
    if (!response.ok) throw new Error("Hiba az API hívásban");
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Hiba:", error);
    return { message: "Hiba történt az API elérésekor." };
  }
};