FROM alfredintelligent/alfred-php-base

ARG ENV=prod

COPY . /var/www
COPY ./.docker/nginx/web.conf /etc/nginx/conf.d/default.conf

# install wkhtmltopdf
# RUN chmod +x ./init_wkhtmltopdf.sh
#RUN update-alternatives --set php /usr/bin/php8.0

# Checks if environment is set to production to install dependencies at build time
# otherwise you need to install them manually
RUN if [ "$ENV" = "prod" ] ; then composer install ; else echo "Not in prod mode"; fi
# RUN if [ "$ENV" = "prod" ] ; then ./init_wkhtmltopdf.sh ; else echo "Not in prod mode"; fi

COPY ./start.sh /start.sh
RUN chmod +x /start.sh

RUN apt-get update && apt-get install -y curl build-essential
RUN curl -fsSL https://deb.nodesource.com/setup_17.x | bash -
RUN apt-get install -y nodejs
# RUN npm install

# RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
# RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
# RUN apt-get update && apt-get install -y yarn

# install package related to wkhtmltopdf
# note to run composer install after the image is build or in cli " ./init_wkhtmltopdf.sh "
# RUN apt-get install -y build-essential xorg libssl-dev libxrender-dev wget gdebi

CMD ["/start.sh"]

