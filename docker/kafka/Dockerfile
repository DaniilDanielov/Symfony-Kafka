FROM confluentinc/cp-kafka:7.4.4

USER root
RUN  chown appuser:appuser -R /var/lib/kafka
RUN chmod 755 -R /var/lib/kafka
USER appuser
