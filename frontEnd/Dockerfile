# Building app
FROM node:alpine as build

COPY package*.json ./
RUN npm install -g @quasar/cli
WORKDIR /app

COPY . .

RUN npm install
RUN quasar build

# Starting NGINX
FROM nginx

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /app/dist/spa /usr/share/nginx/html
