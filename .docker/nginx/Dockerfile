FROM nginx:1.25.1-alpine

ARG SERVER_NAME
ARG WORKDIR_SERVER
ARG TZ
ARG USER

COPY conf/nginx.conf /etc/nginx/nginx.conf
COPY conf/default.conf /etc/nginx/conf.d/default.conf

RUN apk add --update openssl tzdata curl \
    && ln -sf /usr/share/zoneinfo/Etc/$TZ  /etc/localtime \
    && echo $TZ > /etc/timezone \
    && addgroup -g 1000 --system ${USER} \
    && adduser -u 1000 --system -D -G ${USER} ${USER} \
    && mkdir -p ${WORKDIR_SERVER} \
    && chown -R ${USER}:${USER} ${WORKDIR_SERVER} \
    && chmod -R 755 ${WORKDIR_SERVER} \
    && mkdir -p /etc/nginx/ssl \
    && openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout /etc/nginx/ssl/privkey.pem \
        -out /etc/nginx/ssl/fullchain.pem \
        -subj /CN=${SERVER_NAME} \
    && openssl dhparam -out /etc/nginx/dhparam.pem 2048 \
    && sed -i "s#__user#${USER}#g" /etc/nginx/nginx.conf \
    && sed -i "s#__working_dir#${WORKDIR_SERVER}#g" /etc/nginx/conf.d/default.conf \
    && sed -i "s#__server_path#${SERVER_PATH}#g" /etc/nginx/conf.d/default.conf \
    && sed -i "s#__server_name#${SERVER_NAME}#g" /etc/nginx/conf.d/default.conf \
    && apk del tzdata \
    && rm -rf /var/cache/apk/*

RUN chown -R ${USER}:${USER} /etc/nginx/ssl/