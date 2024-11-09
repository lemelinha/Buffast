<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'App\\Bootstrap' => $baseDir . '/App/Bootstrap.php',
    'App\\Connection' => $baseDir . '/App/Connection.php',
    'App\\Controllers\\AdminController' => $baseDir . '/App/Controllers/AdminController.php',
    'App\\Controllers\\IndexController' => $baseDir . '/App/Controllers/IndexController.php',
    'App\\Router' => $baseDir . '/App/Router.php',
    'App\\Tools\\Tools' => $baseDir . '/App/Tools/Tools.php',
    'Attribute' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
    'Brick\\Math\\BigDecimal' => $vendorDir . '/brick/math/src/BigDecimal.php',
    'Brick\\Math\\BigInteger' => $vendorDir . '/brick/math/src/BigInteger.php',
    'Brick\\Math\\BigNumber' => $vendorDir . '/brick/math/src/BigNumber.php',
    'Brick\\Math\\BigRational' => $vendorDir . '/brick/math/src/BigRational.php',
    'Brick\\Math\\Exception\\DivisionByZeroException' => $vendorDir . '/brick/math/src/Exception/DivisionByZeroException.php',
    'Brick\\Math\\Exception\\IntegerOverflowException' => $vendorDir . '/brick/math/src/Exception/IntegerOverflowException.php',
    'Brick\\Math\\Exception\\MathException' => $vendorDir . '/brick/math/src/Exception/MathException.php',
    'Brick\\Math\\Exception\\NegativeNumberException' => $vendorDir . '/brick/math/src/Exception/NegativeNumberException.php',
    'Brick\\Math\\Exception\\NumberFormatException' => $vendorDir . '/brick/math/src/Exception/NumberFormatException.php',
    'Brick\\Math\\Exception\\RoundingNecessaryException' => $vendorDir . '/brick/math/src/Exception/RoundingNecessaryException.php',
    'Brick\\Math\\Internal\\Calculator' => $vendorDir . '/brick/math/src/Internal/Calculator.php',
    'Brick\\Math\\Internal\\Calculator\\BcMathCalculator' => $vendorDir . '/brick/math/src/Internal/Calculator/BcMathCalculator.php',
    'Brick\\Math\\Internal\\Calculator\\GmpCalculator' => $vendorDir . '/brick/math/src/Internal/Calculator/GmpCalculator.php',
    'Brick\\Math\\Internal\\Calculator\\NativeCalculator' => $vendorDir . '/brick/math/src/Internal/Calculator/NativeCalculator.php',
    'Brick\\Math\\RoundingMode' => $vendorDir . '/brick/math/src/RoundingMode.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Core\\Controller\\Controller' => $baseDir . '/App/Core/Controller/Controller.php',
    'Core\\Model\\Model' => $baseDir . '/App/Core/Model/Model.php',
    'Dotenv\\Dotenv' => $vendorDir . '/vlucas/phpdotenv/src/Dotenv.php',
    'Dotenv\\Exception\\ExceptionInterface' => $vendorDir . '/vlucas/phpdotenv/src/Exception/ExceptionInterface.php',
    'Dotenv\\Exception\\InvalidEncodingException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/InvalidEncodingException.php',
    'Dotenv\\Exception\\InvalidFileException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/InvalidFileException.php',
    'Dotenv\\Exception\\InvalidPathException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/InvalidPathException.php',
    'Dotenv\\Exception\\ValidationException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/ValidationException.php',
    'Dotenv\\Loader\\Loader' => $vendorDir . '/vlucas/phpdotenv/src/Loader/Loader.php',
    'Dotenv\\Loader\\LoaderInterface' => $vendorDir . '/vlucas/phpdotenv/src/Loader/LoaderInterface.php',
    'Dotenv\\Loader\\Resolver' => $vendorDir . '/vlucas/phpdotenv/src/Loader/Resolver.php',
    'Dotenv\\Parser\\Entry' => $vendorDir . '/vlucas/phpdotenv/src/Parser/Entry.php',
    'Dotenv\\Parser\\EntryParser' => $vendorDir . '/vlucas/phpdotenv/src/Parser/EntryParser.php',
    'Dotenv\\Parser\\Lexer' => $vendorDir . '/vlucas/phpdotenv/src/Parser/Lexer.php',
    'Dotenv\\Parser\\Lines' => $vendorDir . '/vlucas/phpdotenv/src/Parser/Lines.php',
    'Dotenv\\Parser\\Parser' => $vendorDir . '/vlucas/phpdotenv/src/Parser/Parser.php',
    'Dotenv\\Parser\\ParserInterface' => $vendorDir . '/vlucas/phpdotenv/src/Parser/ParserInterface.php',
    'Dotenv\\Parser\\Value' => $vendorDir . '/vlucas/phpdotenv/src/Parser/Value.php',
    'Dotenv\\Repository\\AdapterRepository' => $vendorDir . '/vlucas/phpdotenv/src/Repository/AdapterRepository.php',
    'Dotenv\\Repository\\Adapter\\AdapterInterface' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/AdapterInterface.php',
    'Dotenv\\Repository\\Adapter\\ApacheAdapter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/ApacheAdapter.php',
    'Dotenv\\Repository\\Adapter\\ArrayAdapter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/ArrayAdapter.php',
    'Dotenv\\Repository\\Adapter\\EnvConstAdapter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/EnvConstAdapter.php',
    'Dotenv\\Repository\\Adapter\\GuardedWriter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/GuardedWriter.php',
    'Dotenv\\Repository\\Adapter\\ImmutableWriter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/ImmutableWriter.php',
    'Dotenv\\Repository\\Adapter\\MultiReader' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/MultiReader.php',
    'Dotenv\\Repository\\Adapter\\MultiWriter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/MultiWriter.php',
    'Dotenv\\Repository\\Adapter\\PutenvAdapter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/PutenvAdapter.php',
    'Dotenv\\Repository\\Adapter\\ReaderInterface' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/ReaderInterface.php',
    'Dotenv\\Repository\\Adapter\\ReplacingWriter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/ReplacingWriter.php',
    'Dotenv\\Repository\\Adapter\\ServerConstAdapter' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/ServerConstAdapter.php',
    'Dotenv\\Repository\\Adapter\\WriterInterface' => $vendorDir . '/vlucas/phpdotenv/src/Repository/Adapter/WriterInterface.php',
    'Dotenv\\Repository\\RepositoryBuilder' => $vendorDir . '/vlucas/phpdotenv/src/Repository/RepositoryBuilder.php',
    'Dotenv\\Repository\\RepositoryInterface' => $vendorDir . '/vlucas/phpdotenv/src/Repository/RepositoryInterface.php',
    'Dotenv\\Store\\FileStore' => $vendorDir . '/vlucas/phpdotenv/src/Store/FileStore.php',
    'Dotenv\\Store\\File\\Paths' => $vendorDir . '/vlucas/phpdotenv/src/Store/File/Paths.php',
    'Dotenv\\Store\\File\\Reader' => $vendorDir . '/vlucas/phpdotenv/src/Store/File/Reader.php',
    'Dotenv\\Store\\StoreBuilder' => $vendorDir . '/vlucas/phpdotenv/src/Store/StoreBuilder.php',
    'Dotenv\\Store\\StoreInterface' => $vendorDir . '/vlucas/phpdotenv/src/Store/StoreInterface.php',
    'Dotenv\\Store\\StringStore' => $vendorDir . '/vlucas/phpdotenv/src/Store/StringStore.php',
    'Dotenv\\Util\\Regex' => $vendorDir . '/vlucas/phpdotenv/src/Util/Regex.php',
    'Dotenv\\Util\\Str' => $vendorDir . '/vlucas/phpdotenv/src/Util/Str.php',
    'Dotenv\\Validator' => $vendorDir . '/vlucas/phpdotenv/src/Validator.php',
    'GrahamCampbell\\ResultType\\Error' => $vendorDir . '/graham-campbell/result-type/src/Error.php',
    'GrahamCampbell\\ResultType\\Result' => $vendorDir . '/graham-campbell/result-type/src/Result.php',
    'GrahamCampbell\\ResultType\\Success' => $vendorDir . '/graham-campbell/result-type/src/Success.php',
    'PhpOption\\LazyOption' => $vendorDir . '/phpoption/phpoption/src/PhpOption/LazyOption.php',
    'PhpOption\\None' => $vendorDir . '/phpoption/phpoption/src/PhpOption/None.php',
    'PhpOption\\Option' => $vendorDir . '/phpoption/phpoption/src/PhpOption/Option.php',
    'PhpOption\\Some' => $vendorDir . '/phpoption/phpoption/src/PhpOption/Some.php',
    'PhpToken' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
    'Ramsey\\Collection\\AbstractArray' => $vendorDir . '/ramsey/collection/src/AbstractArray.php',
    'Ramsey\\Collection\\AbstractCollection' => $vendorDir . '/ramsey/collection/src/AbstractCollection.php',
    'Ramsey\\Collection\\AbstractSet' => $vendorDir . '/ramsey/collection/src/AbstractSet.php',
    'Ramsey\\Collection\\ArrayInterface' => $vendorDir . '/ramsey/collection/src/ArrayInterface.php',
    'Ramsey\\Collection\\Collection' => $vendorDir . '/ramsey/collection/src/Collection.php',
    'Ramsey\\Collection\\CollectionInterface' => $vendorDir . '/ramsey/collection/src/CollectionInterface.php',
    'Ramsey\\Collection\\DoubleEndedQueue' => $vendorDir . '/ramsey/collection/src/DoubleEndedQueue.php',
    'Ramsey\\Collection\\DoubleEndedQueueInterface' => $vendorDir . '/ramsey/collection/src/DoubleEndedQueueInterface.php',
    'Ramsey\\Collection\\Exception\\CollectionException' => $vendorDir . '/ramsey/collection/src/Exception/CollectionException.php',
    'Ramsey\\Collection\\Exception\\CollectionMismatchException' => $vendorDir . '/ramsey/collection/src/Exception/CollectionMismatchException.php',
    'Ramsey\\Collection\\Exception\\InvalidArgumentException' => $vendorDir . '/ramsey/collection/src/Exception/InvalidArgumentException.php',
    'Ramsey\\Collection\\Exception\\InvalidPropertyOrMethod' => $vendorDir . '/ramsey/collection/src/Exception/InvalidPropertyOrMethod.php',
    'Ramsey\\Collection\\Exception\\NoSuchElementException' => $vendorDir . '/ramsey/collection/src/Exception/NoSuchElementException.php',
    'Ramsey\\Collection\\Exception\\OutOfBoundsException' => $vendorDir . '/ramsey/collection/src/Exception/OutOfBoundsException.php',
    'Ramsey\\Collection\\Exception\\UnsupportedOperationException' => $vendorDir . '/ramsey/collection/src/Exception/UnsupportedOperationException.php',
    'Ramsey\\Collection\\GenericArray' => $vendorDir . '/ramsey/collection/src/GenericArray.php',
    'Ramsey\\Collection\\Map\\AbstractMap' => $vendorDir . '/ramsey/collection/src/Map/AbstractMap.php',
    'Ramsey\\Collection\\Map\\AbstractTypedMap' => $vendorDir . '/ramsey/collection/src/Map/AbstractTypedMap.php',
    'Ramsey\\Collection\\Map\\AssociativeArrayMap' => $vendorDir . '/ramsey/collection/src/Map/AssociativeArrayMap.php',
    'Ramsey\\Collection\\Map\\MapInterface' => $vendorDir . '/ramsey/collection/src/Map/MapInterface.php',
    'Ramsey\\Collection\\Map\\NamedParameterMap' => $vendorDir . '/ramsey/collection/src/Map/NamedParameterMap.php',
    'Ramsey\\Collection\\Map\\TypedMap' => $vendorDir . '/ramsey/collection/src/Map/TypedMap.php',
    'Ramsey\\Collection\\Map\\TypedMapInterface' => $vendorDir . '/ramsey/collection/src/Map/TypedMapInterface.php',
    'Ramsey\\Collection\\Queue' => $vendorDir . '/ramsey/collection/src/Queue.php',
    'Ramsey\\Collection\\QueueInterface' => $vendorDir . '/ramsey/collection/src/QueueInterface.php',
    'Ramsey\\Collection\\Set' => $vendorDir . '/ramsey/collection/src/Set.php',
    'Ramsey\\Collection\\Sort' => $vendorDir . '/ramsey/collection/src/Sort.php',
    'Ramsey\\Collection\\Tool\\TypeTrait' => $vendorDir . '/ramsey/collection/src/Tool/TypeTrait.php',
    'Ramsey\\Collection\\Tool\\ValueExtractorTrait' => $vendorDir . '/ramsey/collection/src/Tool/ValueExtractorTrait.php',
    'Ramsey\\Collection\\Tool\\ValueToStringTrait' => $vendorDir . '/ramsey/collection/src/Tool/ValueToStringTrait.php',
    'Ramsey\\Uuid\\BinaryUtils' => $vendorDir . '/ramsey/uuid/src/BinaryUtils.php',
    'Ramsey\\Uuid\\Builder\\BuilderCollection' => $vendorDir . '/ramsey/uuid/src/Builder/BuilderCollection.php',
    'Ramsey\\Uuid\\Builder\\DefaultUuidBuilder' => $vendorDir . '/ramsey/uuid/src/Builder/DefaultUuidBuilder.php',
    'Ramsey\\Uuid\\Builder\\DegradedUuidBuilder' => $vendorDir . '/ramsey/uuid/src/Builder/DegradedUuidBuilder.php',
    'Ramsey\\Uuid\\Builder\\FallbackBuilder' => $vendorDir . '/ramsey/uuid/src/Builder/FallbackBuilder.php',
    'Ramsey\\Uuid\\Builder\\UuidBuilderInterface' => $vendorDir . '/ramsey/uuid/src/Builder/UuidBuilderInterface.php',
    'Ramsey\\Uuid\\Codec\\CodecInterface' => $vendorDir . '/ramsey/uuid/src/Codec/CodecInterface.php',
    'Ramsey\\Uuid\\Codec\\GuidStringCodec' => $vendorDir . '/ramsey/uuid/src/Codec/GuidStringCodec.php',
    'Ramsey\\Uuid\\Codec\\OrderedTimeCodec' => $vendorDir . '/ramsey/uuid/src/Codec/OrderedTimeCodec.php',
    'Ramsey\\Uuid\\Codec\\StringCodec' => $vendorDir . '/ramsey/uuid/src/Codec/StringCodec.php',
    'Ramsey\\Uuid\\Codec\\TimestampFirstCombCodec' => $vendorDir . '/ramsey/uuid/src/Codec/TimestampFirstCombCodec.php',
    'Ramsey\\Uuid\\Codec\\TimestampLastCombCodec' => $vendorDir . '/ramsey/uuid/src/Codec/TimestampLastCombCodec.php',
    'Ramsey\\Uuid\\Converter\\NumberConverterInterface' => $vendorDir . '/ramsey/uuid/src/Converter/NumberConverterInterface.php',
    'Ramsey\\Uuid\\Converter\\Number\\BigNumberConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Number/BigNumberConverter.php',
    'Ramsey\\Uuid\\Converter\\Number\\DegradedNumberConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Number/DegradedNumberConverter.php',
    'Ramsey\\Uuid\\Converter\\Number\\GenericNumberConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Number/GenericNumberConverter.php',
    'Ramsey\\Uuid\\Converter\\TimeConverterInterface' => $vendorDir . '/ramsey/uuid/src/Converter/TimeConverterInterface.php',
    'Ramsey\\Uuid\\Converter\\Time\\BigNumberTimeConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Time/BigNumberTimeConverter.php',
    'Ramsey\\Uuid\\Converter\\Time\\DegradedTimeConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Time/DegradedTimeConverter.php',
    'Ramsey\\Uuid\\Converter\\Time\\GenericTimeConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Time/GenericTimeConverter.php',
    'Ramsey\\Uuid\\Converter\\Time\\PhpTimeConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Time/PhpTimeConverter.php',
    'Ramsey\\Uuid\\Converter\\Time\\UnixTimeConverter' => $vendorDir . '/ramsey/uuid/src/Converter/Time/UnixTimeConverter.php',
    'Ramsey\\Uuid\\DegradedUuid' => $vendorDir . '/ramsey/uuid/src/DegradedUuid.php',
    'Ramsey\\Uuid\\DeprecatedUuidInterface' => $vendorDir . '/ramsey/uuid/src/DeprecatedUuidInterface.php',
    'Ramsey\\Uuid\\DeprecatedUuidMethodsTrait' => $vendorDir . '/ramsey/uuid/src/DeprecatedUuidMethodsTrait.php',
    'Ramsey\\Uuid\\Exception\\BuilderNotFoundException' => $vendorDir . '/ramsey/uuid/src/Exception/BuilderNotFoundException.php',
    'Ramsey\\Uuid\\Exception\\DateTimeException' => $vendorDir . '/ramsey/uuid/src/Exception/DateTimeException.php',
    'Ramsey\\Uuid\\Exception\\DceSecurityException' => $vendorDir . '/ramsey/uuid/src/Exception/DceSecurityException.php',
    'Ramsey\\Uuid\\Exception\\InvalidArgumentException' => $vendorDir . '/ramsey/uuid/src/Exception/InvalidArgumentException.php',
    'Ramsey\\Uuid\\Exception\\InvalidBytesException' => $vendorDir . '/ramsey/uuid/src/Exception/InvalidBytesException.php',
    'Ramsey\\Uuid\\Exception\\InvalidUuidStringException' => $vendorDir . '/ramsey/uuid/src/Exception/InvalidUuidStringException.php',
    'Ramsey\\Uuid\\Exception\\NameException' => $vendorDir . '/ramsey/uuid/src/Exception/NameException.php',
    'Ramsey\\Uuid\\Exception\\NodeException' => $vendorDir . '/ramsey/uuid/src/Exception/NodeException.php',
    'Ramsey\\Uuid\\Exception\\RandomSourceException' => $vendorDir . '/ramsey/uuid/src/Exception/RandomSourceException.php',
    'Ramsey\\Uuid\\Exception\\TimeSourceException' => $vendorDir . '/ramsey/uuid/src/Exception/TimeSourceException.php',
    'Ramsey\\Uuid\\Exception\\UnableToBuildUuidException' => $vendorDir . '/ramsey/uuid/src/Exception/UnableToBuildUuidException.php',
    'Ramsey\\Uuid\\Exception\\UnsupportedOperationException' => $vendorDir . '/ramsey/uuid/src/Exception/UnsupportedOperationException.php',
    'Ramsey\\Uuid\\Exception\\UuidExceptionInterface' => $vendorDir . '/ramsey/uuid/src/Exception/UuidExceptionInterface.php',
    'Ramsey\\Uuid\\FeatureSet' => $vendorDir . '/ramsey/uuid/src/FeatureSet.php',
    'Ramsey\\Uuid\\Fields\\FieldsInterface' => $vendorDir . '/ramsey/uuid/src/Fields/FieldsInterface.php',
    'Ramsey\\Uuid\\Fields\\SerializableFieldsTrait' => $vendorDir . '/ramsey/uuid/src/Fields/SerializableFieldsTrait.php',
    'Ramsey\\Uuid\\Generator\\CombGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/CombGenerator.php',
    'Ramsey\\Uuid\\Generator\\DceSecurityGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/DceSecurityGenerator.php',
    'Ramsey\\Uuid\\Generator\\DceSecurityGeneratorInterface' => $vendorDir . '/ramsey/uuid/src/Generator/DceSecurityGeneratorInterface.php',
    'Ramsey\\Uuid\\Generator\\DefaultNameGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/DefaultNameGenerator.php',
    'Ramsey\\Uuid\\Generator\\DefaultTimeGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/DefaultTimeGenerator.php',
    'Ramsey\\Uuid\\Generator\\NameGeneratorFactory' => $vendorDir . '/ramsey/uuid/src/Generator/NameGeneratorFactory.php',
    'Ramsey\\Uuid\\Generator\\NameGeneratorInterface' => $vendorDir . '/ramsey/uuid/src/Generator/NameGeneratorInterface.php',
    'Ramsey\\Uuid\\Generator\\PeclUuidNameGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/PeclUuidNameGenerator.php',
    'Ramsey\\Uuid\\Generator\\PeclUuidRandomGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/PeclUuidRandomGenerator.php',
    'Ramsey\\Uuid\\Generator\\PeclUuidTimeGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/PeclUuidTimeGenerator.php',
    'Ramsey\\Uuid\\Generator\\RandomBytesGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/RandomBytesGenerator.php',
    'Ramsey\\Uuid\\Generator\\RandomGeneratorFactory' => $vendorDir . '/ramsey/uuid/src/Generator/RandomGeneratorFactory.php',
    'Ramsey\\Uuid\\Generator\\RandomGeneratorInterface' => $vendorDir . '/ramsey/uuid/src/Generator/RandomGeneratorInterface.php',
    'Ramsey\\Uuid\\Generator\\RandomLibAdapter' => $vendorDir . '/ramsey/uuid/src/Generator/RandomLibAdapter.php',
    'Ramsey\\Uuid\\Generator\\TimeGeneratorFactory' => $vendorDir . '/ramsey/uuid/src/Generator/TimeGeneratorFactory.php',
    'Ramsey\\Uuid\\Generator\\TimeGeneratorInterface' => $vendorDir . '/ramsey/uuid/src/Generator/TimeGeneratorInterface.php',
    'Ramsey\\Uuid\\Generator\\UnixTimeGenerator' => $vendorDir . '/ramsey/uuid/src/Generator/UnixTimeGenerator.php',
    'Ramsey\\Uuid\\Guid\\Fields' => $vendorDir . '/ramsey/uuid/src/Guid/Fields.php',
    'Ramsey\\Uuid\\Guid\\Guid' => $vendorDir . '/ramsey/uuid/src/Guid/Guid.php',
    'Ramsey\\Uuid\\Guid\\GuidBuilder' => $vendorDir . '/ramsey/uuid/src/Guid/GuidBuilder.php',
    'Ramsey\\Uuid\\Lazy\\LazyUuidFromString' => $vendorDir . '/ramsey/uuid/src/Lazy/LazyUuidFromString.php',
    'Ramsey\\Uuid\\Math\\BrickMathCalculator' => $vendorDir . '/ramsey/uuid/src/Math/BrickMathCalculator.php',
    'Ramsey\\Uuid\\Math\\CalculatorInterface' => $vendorDir . '/ramsey/uuid/src/Math/CalculatorInterface.php',
    'Ramsey\\Uuid\\Math\\RoundingMode' => $vendorDir . '/ramsey/uuid/src/Math/RoundingMode.php',
    'Ramsey\\Uuid\\Nonstandard\\Fields' => $vendorDir . '/ramsey/uuid/src/Nonstandard/Fields.php',
    'Ramsey\\Uuid\\Nonstandard\\Uuid' => $vendorDir . '/ramsey/uuid/src/Nonstandard/Uuid.php',
    'Ramsey\\Uuid\\Nonstandard\\UuidBuilder' => $vendorDir . '/ramsey/uuid/src/Nonstandard/UuidBuilder.php',
    'Ramsey\\Uuid\\Nonstandard\\UuidV6' => $vendorDir . '/ramsey/uuid/src/Nonstandard/UuidV6.php',
    'Ramsey\\Uuid\\Provider\\DceSecurityProviderInterface' => $vendorDir . '/ramsey/uuid/src/Provider/DceSecurityProviderInterface.php',
    'Ramsey\\Uuid\\Provider\\Dce\\SystemDceSecurityProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Dce/SystemDceSecurityProvider.php',
    'Ramsey\\Uuid\\Provider\\NodeProviderInterface' => $vendorDir . '/ramsey/uuid/src/Provider/NodeProviderInterface.php',
    'Ramsey\\Uuid\\Provider\\Node\\FallbackNodeProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Node/FallbackNodeProvider.php',
    'Ramsey\\Uuid\\Provider\\Node\\NodeProviderCollection' => $vendorDir . '/ramsey/uuid/src/Provider/Node/NodeProviderCollection.php',
    'Ramsey\\Uuid\\Provider\\Node\\RandomNodeProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Node/RandomNodeProvider.php',
    'Ramsey\\Uuid\\Provider\\Node\\StaticNodeProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Node/StaticNodeProvider.php',
    'Ramsey\\Uuid\\Provider\\Node\\SystemNodeProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Node/SystemNodeProvider.php',
    'Ramsey\\Uuid\\Provider\\TimeProviderInterface' => $vendorDir . '/ramsey/uuid/src/Provider/TimeProviderInterface.php',
    'Ramsey\\Uuid\\Provider\\Time\\FixedTimeProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Time/FixedTimeProvider.php',
    'Ramsey\\Uuid\\Provider\\Time\\SystemTimeProvider' => $vendorDir . '/ramsey/uuid/src/Provider/Time/SystemTimeProvider.php',
    'Ramsey\\Uuid\\Rfc4122\\Fields' => $vendorDir . '/ramsey/uuid/src/Rfc4122/Fields.php',
    'Ramsey\\Uuid\\Rfc4122\\FieldsInterface' => $vendorDir . '/ramsey/uuid/src/Rfc4122/FieldsInterface.php',
    'Ramsey\\Uuid\\Rfc4122\\MaxTrait' => $vendorDir . '/ramsey/uuid/src/Rfc4122/MaxTrait.php',
    'Ramsey\\Uuid\\Rfc4122\\MaxUuid' => $vendorDir . '/ramsey/uuid/src/Rfc4122/MaxUuid.php',
    'Ramsey\\Uuid\\Rfc4122\\NilTrait' => $vendorDir . '/ramsey/uuid/src/Rfc4122/NilTrait.php',
    'Ramsey\\Uuid\\Rfc4122\\NilUuid' => $vendorDir . '/ramsey/uuid/src/Rfc4122/NilUuid.php',
    'Ramsey\\Uuid\\Rfc4122\\TimeTrait' => $vendorDir . '/ramsey/uuid/src/Rfc4122/TimeTrait.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidBuilder' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidBuilder.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidInterface' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidInterface.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV1' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV1.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV2' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV2.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV3' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV3.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV4' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV4.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV5' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV5.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV6' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV6.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV7' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV7.php',
    'Ramsey\\Uuid\\Rfc4122\\UuidV8' => $vendorDir . '/ramsey/uuid/src/Rfc4122/UuidV8.php',
    'Ramsey\\Uuid\\Rfc4122\\Validator' => $vendorDir . '/ramsey/uuid/src/Rfc4122/Validator.php',
    'Ramsey\\Uuid\\Rfc4122\\VariantTrait' => $vendorDir . '/ramsey/uuid/src/Rfc4122/VariantTrait.php',
    'Ramsey\\Uuid\\Rfc4122\\VersionTrait' => $vendorDir . '/ramsey/uuid/src/Rfc4122/VersionTrait.php',
    'Ramsey\\Uuid\\Type\\Decimal' => $vendorDir . '/ramsey/uuid/src/Type/Decimal.php',
    'Ramsey\\Uuid\\Type\\Hexadecimal' => $vendorDir . '/ramsey/uuid/src/Type/Hexadecimal.php',
    'Ramsey\\Uuid\\Type\\Integer' => $vendorDir . '/ramsey/uuid/src/Type/Integer.php',
    'Ramsey\\Uuid\\Type\\NumberInterface' => $vendorDir . '/ramsey/uuid/src/Type/NumberInterface.php',
    'Ramsey\\Uuid\\Type\\Time' => $vendorDir . '/ramsey/uuid/src/Type/Time.php',
    'Ramsey\\Uuid\\Type\\TypeInterface' => $vendorDir . '/ramsey/uuid/src/Type/TypeInterface.php',
    'Ramsey\\Uuid\\Uuid' => $vendorDir . '/ramsey/uuid/src/Uuid.php',
    'Ramsey\\Uuid\\UuidFactory' => $vendorDir . '/ramsey/uuid/src/UuidFactory.php',
    'Ramsey\\Uuid\\UuidFactoryInterface' => $vendorDir . '/ramsey/uuid/src/UuidFactoryInterface.php',
    'Ramsey\\Uuid\\UuidInterface' => $vendorDir . '/ramsey/uuid/src/UuidInterface.php',
    'Ramsey\\Uuid\\Validator\\GenericValidator' => $vendorDir . '/ramsey/uuid/src/Validator/GenericValidator.php',
    'Ramsey\\Uuid\\Validator\\ValidatorInterface' => $vendorDir . '/ramsey/uuid/src/Validator/ValidatorInterface.php',
    'Stringable' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
    'Symfony\\Polyfill\\Ctype\\Ctype' => $vendorDir . '/symfony/polyfill-ctype/Ctype.php',
    'Symfony\\Polyfill\\Mbstring\\Mbstring' => $vendorDir . '/symfony/polyfill-mbstring/Mbstring.php',
    'Symfony\\Polyfill\\Php80\\Php80' => $vendorDir . '/symfony/polyfill-php80/Php80.php',
    'Symfony\\Polyfill\\Php80\\PhpToken' => $vendorDir . '/symfony/polyfill-php80/PhpToken.php',
    'UnhandledMatchError' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
    'ValueError' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
);
