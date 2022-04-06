<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\Component\OpenApi3\JsonSchema\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Jane\Component\OpenApi3\JsonSchema\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ResponsesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Responses';
    }

    public function supportsNormalization($data, $format = null) : bool
    {
        return $data instanceof \Jane\Component\OpenApi3\JsonSchema\Model\Responses;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Jane\Component\OpenApi3\JsonSchema\Model\Responses();
        if (\array_key_exists('default', $data) && $data['default'] !== null) {
            $value = $data['default'];
            if (is_array($data['default']) and isset($data['default']['$ref'])) {
                $value = $this->denormalizer->denormalize($data['default'], 'Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Reference', 'json', $context);
            } elseif (is_array($data['default']) and isset($data['default']['description'])) {
                $value = $this->denormalizer->denormalize($data['default'], 'Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Response', 'json', $context);
            }
            $object->setDefault($value);
            unset($data['default']);
        } elseif (\array_key_exists('default', $data) && $data['default'] === null) {
            $object->setDefault(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/^[1-9](?:\d{2}|XX)$/', (string) $key)) {
                $value_2 = $value_1;
                if (is_array($value_1) and isset($value_1['$ref'])) {
                    $value_2 = $this->denormalizer->denormalize($value_1, 'Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Reference', 'json', $context);
                } elseif (is_array($value_1) and isset($value_1['description'])) {
                    $value_2 = $this->denormalizer->denormalize($value_1, 'Jane\\Component\\OpenApi3\\JsonSchema\\Model\\Response', 'json', $context);
                }
                $object[$key] = $value_2;
            }
            if (preg_match('/^x-/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getDefault()) {
            $value = $object->getDefault();
            if (is_object($object->getDefault())) {
                $value = $this->normalizer->normalize($object->getDefault(), 'json', $context);
            } elseif (is_object($object->getDefault())) {
                $value = $this->normalizer->normalize($object->getDefault(), 'json', $context);
            }
            $data['default'] = $value;
        } else {
            $data['default'] = null;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/^[1-5](?:\d{2}|XX)$/', (string) $key)) {
                $value_2 = $value_1;
                if (is_object($value_1)) {
                    $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                } elseif (is_object($value_1)) {
                    $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data[$key] = $value_2;
            }
            if (preg_match('/^x-/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
