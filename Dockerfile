FROM php:7.2-cli
COPY ./php/ /app/
WORKDIR /app/

CMD [ "php", "/app/downloadPDF.php" ]
