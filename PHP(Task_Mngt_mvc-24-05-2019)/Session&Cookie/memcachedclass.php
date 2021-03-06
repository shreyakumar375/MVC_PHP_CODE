//Represents a connection to a set of memcached servers. 
 Memcached {
public __construct ([ string $persistent_id ] )
public add ( string $key , mixed $value [, int $expiration ] ) : bool
public addByKey ( string $server_key , string $key , mixed $value [, int $expiration ] ) : bool
public addServer ( string $host , int $port [, int $weight = 0 ] ) : bool
public addServers ( array $servers ) : bool
public append ( string $key , string $value ) : bool
public appendByKey ( string $server_key , string $key , string $value ) : bool
public cas ( float $cas_token , string $key , mixed $value [, int $expiration ] ) : bool
public casByKey ( float $cas_token , string $server_key , string $key , mixed $value [, int $expiration ] ) : bool
public decrement ( string $key [, int $offset = 1 [, int $initial_value = 0 [, int $expiry = 0 ]]] ) : int
public decrementByKey ( string $server_key , string $key [, int $offset = 1 [, int $initial_value = 0 [, int $expiry = 0 ]]] ) : int
public delete ( string $key [, int $time = 0 ] ) : bool
public deleteByKey ( string $server_key , string $key [, int $time = 0 ] ) : bool
public deleteMulti ( array $keys [, int $time = 0 ] ) : array
public deleteMultiByKey ( string $server_key , array $keys [, int $time = 0 ] ) : bool
public fetch ( void ) : array
public fetchAll ( void ) : array
public flush ([ int $delay = 0 ] ) : bool
public get ( string $key [, callable $cache_cb [, int $$flags ]] ) : mixed
public getAllKeys ( void ) : array
public getByKey ( string $server_key , string $key [, callable $cache_cb [, int $flags ]] ) : mixed
public getDelayed ( array $keys [, bool $with_cas [, callable $value_cb ]] ) : bool
public getDelayedByKey ( string $server_key , array $keys [, bool $with_cas [, callable $value_cb ]] ) : bool
public getMulti ( array $keys [, int $flags ] ) : mixed
public getMultiByKey ( string $server_key , array $keys [, int $flags ] ) : array
public getOption ( int $option ) : mixed
public getResultCode ( void ) : int
public getResultMessage ( void ) : string
public getServerByKey ( string $server_key ) : array
public getServerList ( void ) : array
public getStats ( void ) : array
public getVersion ( void ) : array
public increment ( string $key [, int $offset = 1 [, int $initial_value = 0 [, int $expiry = 0 ]]] ) : int
public incrementByKey ( string $server_key , string $key [, int $offset = 1 [, int $initial_value = 0 [, int $expiry = 0 ]]] ) : int
public isPersistent ( void ) : bool
public isPristine ( void ) : bool
public prepend ( string $key , string $value ) : bool
public prependByKey ( string $server_key , string $key , string $value ) : bool
public quit ( void ) : bool
public replace ( string $key , mixed $value [, int $expiration ] ) : bool
public replaceByKey ( string $server_key , string $key , mixed $value [, int $expiration ] ) : bool
public resetServerList ( void ) : bool
public set ( string $key , mixed $value [, int $expiration ] ) : bool
public setByKey ( string $server_key , string $key , mixed $value [, int $expiration ] ) : bool
public setMulti ( array $items [, int $expiration ] ) : bool
public setMultiByKey ( string $server_key , array $items [, int $expiration ] ) : bool
public setOption ( int $option , mixed $value ) : bool
public setOptions ( array $options ) : bool
public setSaslAuthData ( string $username , string $password ) : void
public touch ( string $key , int $expiration ) : bool
public touchByKey ( string $server_key , string $key , int $expiration ) : bool
}
