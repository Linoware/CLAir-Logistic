

-- Route Countries [ get only country_id available in Route ]
drop view if exists view_route_countries;
create view view_route_countries
as
select distinct origin_country_id country_id
from routes r join countries c
on r.origin_country_id = c.country_id
where r.enable_status = 1 and c.enable_status = 1 
union
select distinct destination_country_id
from routes r join countries c
on r.destination_country_id = c.country_id
where r.enable_status = 1 and c.enable_status = 1 ;

-- ===========================================================================
drop view if exists view_available_routes_countries;
create view view_available_routes_countries
as
select r.country_id,
(select country_name from countries c where r.country_id = c.country_id) country_name,
(select country_name_native from countries c where r.country_id = c.country_id) country_name_native,
(select country_code from countries c where r.country_id = c.country_id) country_code,
(select country_short_code from countries c where r.country_id = c.country_id) country_short_code,
(select enable_status from countries c where r.country_id = c.country_id) enable_status,
(select created_by from countries c where r.country_id = c.country_id) created_by,
(select created_at from countries c where r.country_id = c.country_id) created_at,
(select updated_by from countries c where r.country_id = c.country_id) updated_by,
(select updated_at from countries c where r.country_id = c.country_id) updated_at
from view_route_countries r;

-- ===========================================================================
drop view if exists  view_freights_routes;
create view view_freights_routes
as
select r.route_id, f.freight_id, r.origin_country_id, r.destination_country_id, r.currency_id, r.description, r.enable_status, r.created_by, r.created_at
from routes r join freights f
on r.route_id = f.route_id
where r.enable_status = 1
and f.enable_status = 1;

-- ===========================================================================
drop view if exists  view_freights_provinces;
create view view_freights_provinces
as
select fr.route_id,fop.freight_id,fop.province_id,fop.enable_status, fop.created_by, fop.created_at, fop.updated_by, fop.updated_at, 'ORIGIN' remarks
from freight_origin_provinces fop join view_freights_routes fr
on fop.freight_id = fr.freight_id
where fop.enable_status = 1 and fr.enable_status =1
union all
select fr.route_id,fdp.freight_id,fdp.province_id,fdp.enable_status, fdp.created_by, fdp.created_at, fdp.updated_by, fdp.updated_at, 'DESTINATION'
from freight_destination_provinces fdp join view_freights_routes fr
on fdp.freight_id = fr.freight_id
where fdp.enable_status = 1 and fr.enable_status =1;

-- ===========================================================================
drop view if exists  view_available_freight_provinces;
create view view_available_freight_provinces
as
select fp.route_id,p.country_id,fp.province_id, p.province_name, p.province_code, p.province_short_code, p.enable_status, p.created_by, p.created_at, p.updated_by, p.updated_at
from view_freights_provinces fp join provinces p 
on fp.province_id = p.province_id
group by fp.route_id,p.country_id,fp.province_id, p.province_name, p.province_code, p.province_short_code, p.enable_status, p.created_by, p.created_at, p.updated_by, p.updated_at;

-- ===========================================================================
drop view if exists  view_available_zone_cities;
create view view_available_zone_cities
as
select cz.city_zone_name, c.*,p.country_id, czd.city_zone_id
from provinces p join city_zones cz
on p.province_id = cz.province_id join cities_zones_detail czd
on cz.city_zone_id = czd.city_zone_id join cities c
on czd.city_id = c.city_id;

