# Use an official PHP image
FROM php:8.1-cli

# Set the working directory
WORKDIR /var/www/html

# Copy project files to the container
COPY . .

# Expose port 80
EXPOSE 80

# Start the PHP server
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
