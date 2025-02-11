# Használjunk egy Node.js alapú image-et
FROM node:18

# Munkakönyvtár beállítása a konténeren belül
WORKDIR /app

# Másoljuk át a package.json és package-lock.json fájlokat
COPY package.json package-lock.json ./

# Telepítsük a csomagokat
RUN npm install

# Másoljuk a teljes alkalmazást a konténerbe
COPY . .

# Indítsuk el a fejlesztői szervert
CMD ["npm", "start"]